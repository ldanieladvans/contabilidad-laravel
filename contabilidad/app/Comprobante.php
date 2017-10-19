<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    protected $table = "comp";

    protected $fillable = ['comp_uuid','comp_rfc_emisor','comp_rfc_receptor','comp_f_emision','comp_complmto','comp_tipocomp','comp_cbb_serie','comp_cbb_numfolio','comp_num_factelect','comp_taxid','comp_espago','comp_imp_bov'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function comprobantesRel()
    {
        return $this->hasMany('App\ComprobanteRel','comprel_comp_id');
    }

    public function provision()
    {
        return $this->hasMany('App\Provision','provis_comp_id');
    }

    public function pagos()
    {
        return $this->hasMany('App\Pago','pago_comp_id');
    }

    public function polizas(){

        return $this->belongsToMany('App\Poliza','polzcomp','polzcomp_comp_id','polzcomp_polz_id');
    }

    public function nominas()
    {
        return $this->hasMany('App\Nomina','nom_comp_id');
    }

    public function getPolizas()
    {
        return (!$this->polizas) ? $this->polizas = $this->polizas()->get() : $this->polizas;
    }

    public function tienePoliza($poliza)
    {
        return $this->getPolizas()->contains(function ($value, $key) use ($poliza) {
            return $poliza == $value->id;
        });
    }

    public function contabIngreso($comp_id, $xml_array, $importada)
    {
        $cta_x_cob = 1;
        $cta_ing = 1;
        $cta_iva_trasl_x_cob = 1;
        $cta_iva_reten_x_cob = 1;
        $cta_isr_reten_x_cob = 1;
        $cta_desc = 1;
        $cta_ieps_x_cob = 1;
        $cta_ieps_reten_x_cob = 1;

        $cta_iva_trasl_cob = 1;
        $cta_iva_reten_cob = 1;
        $cta_isr_reten_cob = 1;
        $cta_ieps_cob = 1;
        $cta_ieps_reten_cob = 1;

        $monto_iva_trasl_x_cob = 0;
        $monto_iva_reten_x_cob = 0;
        $monto_isr_reten_x_cob = 0;
        $monto_ieps_x_cob = 0;
        $monto_ieps_reten_x_cob = 0;

        $comp_atributos = $xml_array['cfdi:Comprobante']['@attributes'];

        $rfc_cliente = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['rfc'];
        $clientes = \Cliente::where('cliente_rfc', '=', $rfc_cliente)->get();
        $cliente = $clientes[0];
        if ($cliente->cliente_forma_contab == 'cliente')
        {
            $cta_x_cob = $cliente->cliente_cta_por_cobrar_id;
            $cta_ing = $cliente->cliente_cta_ingreso_id;
            $cta_iva_trasl_x_cob = $cliente->cliente_cta_iva_traslad_x_cob_id;
            $cta_iva_reten_x_cob = $cliente->cliente_cta_iva_reten_x_cob_id;
            $cta_isr_reten_x_cob = $cliente->cliente_cta_isr_reten_id;
            $cta_desc = $cliente->cliente_cta_desc_id;
            $cta_ieps_x_cob = $cliente->cliente_cta_ieps_por_cobrar_id;
            $cta_ieps_reten_x_cob = $cliente->cliente_cta_ieps_reten_por_cobrar_id;
            $conc_pol = $cliente->cliente_concepto_polz;

            $cta_iva_trasl_cob = $cliente->cliente_cta_iva_traslad_cob_id;
            $cta_iva_reten_cob = $cliente->cliente_cta_iva_reten_cob_id;
            $cta_isr_reten_cob = $cliente->cliente_cta_isr_reten_cob_id;
            $cta_ieps_cob = $cliente->cliente_cta_ieps_cobrado_id;
            $cta_ieps_reten_cob = $cliente->cliente_cta_ieps_reten_cobrado_id;

        }
        else
        {
            $tip_client = \TipoCliente::find($cliente->cliente_tipcliente_id);

            $cta_x_cob = $tip_client->tipcliente_cta_por_cobrar_id;
            $cta_ing = $tip_client->tipcliente_cta_ingreso_id;
            $cta_iva_trasl_x_cob = $tip_client->tipcliente_cta_iva_traslad_x_cob_id;
            $cta_iva_reten_x_cob = $tip_client->tipcliente_cta_iva_reten_x_cob_id;
            $cta_isr_reten_x_cob = $tip_client->tipcliente_cta_isr_reten_id;
            $cta_desc = $tip_client->tipcliente_cta_desc_id;
            $cta_ieps_x_cob = $tip_client->tipcliente_cta_ieps_por_cobrar_id;
            $cta_ieps_reten_x_cob = $tip_client->tipcliente_cta_ieps_reten_por_cobrar_id;
            $conc_pol = $tip_client->tipcliente_concpto_polz;

            $cta_iva_trasl_cob = $tipcliente_concpto_polz->tipcliente_cta_iva_traslad_cob_id;
            $cta_iva_reten_cob = $tipcliente_concpto_polz->tipcliente_cta_iva_reten_cob_id;
            $cta_isr_reten_cob = $tipcliente_concpto_polz->tipcliente_cta_isr_reten_cob_id;
            $cta_ieps_cob = $tipcliente_concpto_polz->tipcliente_cta_ieps_cobrado_id;
            $cta_ieps_reten_cob = $tipcliente_concpto_polz->tipcliente_cta_ieps_reten_cobrado_id;
        }
       
        //Generando póliza de diario
        //Identificando período
        $fecha = $comp_atributos['fecha'];
        $period = \Periodo::where($fecha, '>=', 'period_fecha_ini')->where($fecha, '<=', 'period_fecha_fin')->get();
        $period_id = 1;
        if (count($period) > 0)
        {
            $period_id = $period[0]->id;
        }

        $pol_id = $this->crearPoliza($comp_id, 'diario', $comp_atributos['total'], $comp_atributos['fecha'], $importada, 'POL/DIA/', $conc_pol, $period_id);


        //Generando asiento de cuenta por cobrar
        $this->crearAsiento($pol_id, 'AST/XCOB/', $comp_atributos['total'], $conc_pol, "debe", $cta_x_cob);

        //Generando asiento de INGRESO
        $this->crearAsiento($pol_id, 'AST/ING/', $comp_atributos['subTotal'], $conc_pol, "haber", $cta_ing);
        
        //Generando asientos de impuestos
        //Generando asientos de impuestos
        $impuestos = $this->contabImp($pol_id, $conc_pol, $xml_array['cfdi:Comprobante']['cfdi:Impuestos'], 'haber', 'debe', $cta_iva_trasl_x_cob, $cta_ieps_x_cob, $cta_isr_reten_x_cob, $cta_iva_reten_x_cob, $cta_ieps_reten_x_cob);

       
        //Generando asiento de descuento
        if (array_key_exists('Descuento',$comp_atributos) && isset($comp_atributos['Descuento']))
        {
            $this->crearAsiento($pol_id, 'AST/DESC/', $comp_atributos['Descuento'], $conc_pol, "debe", $cta_desc);
        }

        //Verificando si fue pagada en una sola exhibición
        if ($comp_atributos['MetodoPago'] == 'PUE')
        {
            $polpago_id = $this->crearPoliza($comp_id, 'ingreso', $comp_atributos['total'], $comp_atributos['fecha'], $importada, 'POL/ING/', $conc_pol, $period_id);

            //Generando abono de cuenta por cobrar
            $this->crearAsiento($polpago_id, 'AST/COB/', $comp_atributos['total'], $conc_pol, "haber", $cta_x_cob);
            

            //Generando asiento de entrada de dinero
            $forma_pago_cod = $comp_atributos['FormaPago'];
            $forma_pago = \FormaPago::where('formpago_formpagosat_cod', '=', $forma_pago_cod)->get();
            $cta_pago_id = \Cuenta::where('ctacont_efectivo','=',true)->get()[0];
            if (count($forma_pago) > 0)
            {
                $cta_pago_id = $forma_pago[0]->formpago_ctacont_id;
            }
            $this->crearAsiento($polpago_id, 'AST/PAG/', $comp_atributos['total'], $conc_pol, "debe", $cta_pago_id);

            //Generando asientos de reclasificación de impuestos
            $this->contabReclasifImp($pol_id, $conc_pol, $impuestos, 'debe', 'haber', $cta_iva_trasl_x_cob, $cta_ieps_x_cob, $cta_isr_reten_x_cob, $cta_iva_reten_x_cob, $cta_ieps_reten_x_cob, $cta_iva_trasl_cob, $cta_ieps_cob, $cta_isr_reten_cob, $cta_iva_reten_cob, $cta_ieps_reten_cob);
        }
    }

    public function contabEgreso($comp_id, $xml_array, $importada)
    {
        $cta_x_pag = 1;
        $cta_gast = 1;
        $cta_iva_acred_x_cob = 1;
        $cta_iva_reten_x_cob = 1;
        $cta_isr_reten_x_cob = 1;
        $cta_desc = 1;
        $cta_ieps_x_cob = 1;
        $cta_ieps_reten_x_cob = 1;

        $cta_iva_acred_cob = 1;
        $cta_iva_reten_cob = 1;
        $cta_isr_reten_cob = 1;
        $cta_ieps_cob = 1;
        $cta_ieps_reten_cob = 1;

        $monto_iva_acred_x_cob = 0;
        $monto_iva_reten_x_cob = 0;
        $monto_isr_reten_x_cob = 0;
        $monto_ieps_x_cob = 0;
        $monto_ieps_reten_x_cob = 0;

        $comp_atributos = $xml_array['cfdi:Comprobante']['@attributes'];

        $rfc_prov = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['rfc'];
        $proveedores = \Proveedor::where('proveed_rfc', '=', $rfc_prov)->get();
        $proveedor = $proveedores[0];
        if ($proveedor->proveed_forma_contab == 'proveedor')
        {
            $cta_x_pag = $proveedor->proveed_cta_por_pagar_id;
            $cta_gast = $proveedor->proveed_cta_egreso_id;
            $cta_iva_acred_x_cob = $proveedor->proveed_cta_iva_acredit_x_cob_id;
            $cta_iva_reten_x_cob = $proveedor->proveed_cta_iva_reten_x_cob_id;
            $cta_isr_reten_x_cob = $proveedor->proveed_cta_isr_reten_id;
            $cta_desc = $proveedor->proveed_cta_desc_id;
            $cta_ieps_x_cob = $proveedor->proveed_cta_ieps_por_cobrar_id;
            $cta_ieps_reten_x_cob = $proveedor->proveed_cta_ieps_reten_por_cobrar_id;
            $conc_pol = $proveedor->proveed_concepto_polz;

            $cta_iva_acred_cob = $proveedor->proveed_cta_iva_acredit_cob_id;
            $cta_iva_reten_cob = $proveedor->proveed_cta_iva_reten_cob_id;
            $cta_isr_reten_cob = $proveedor->proveed_cta_isr_reten_cob_id;
            $cta_ieps_cob = $proveedor->proveed_cta_ieps_cobrado_id;
            $cta_ieps_reten_cob = $proveedor->proveed_cta_ieps_reten_cobrado_id;

        }
        else
        {
            $tip_prov = \TipoProveedor::find($proveedor->proveed_tipprov_id);

            $cta_x_pag = $tip_prov->tipprov_cta_por_pagar_id;
            $cta_gast = $tip_prov->tipprov_cta_egreso_id;
            $cta_iva_acred_x_cob = $tip_prov->tipprov_cta_iva_acredit_x_cob_id;
            $cta_iva_reten_x_cob = $tip_prov->tipprov_cta_iva_reten_x_cob_id;
            $cta_isr_reten_x_cob = $tip_prov->tipprov_cta_isr_reten_id;
            $cta_desc = $tip_prov->tipprov_cta_desc_id;
            $cta_ieps_x_cob = $tip_prov->tipprov_cta_ieps_por_cobrar_id;
            $cta_ieps_reten_x_cob = $tip_prov->tipprov_cta_ieps_reten_por_cobrar_id;
            $conc_pol = $tip_prov->tipprov_concepto_polz;

            $cta_iva_acred_cob = $tip_prov->tipprov_cta_iva_acredit_cob_id;
            $cta_iva_reten_cob = $tip_prov->tipprov_cta_iva_reten_cob_id;
            $cta_isr_reten_cob = $tip_prov->tipprov_cta_isr_reten_cob_id;
            $cta_ieps_cob = $tip_prov->tipprov_cta_ieps_cobrado_id;
            $cta_ieps_reten_cob = $tip_prov->tipprov_cta_ieps_reten_cobrado_id;
        }

        //Generando póliza de diario
        //Identificando período
        $fecha = $comp_atributos['fecha'];
        $period = \Periodo::where($fecha, '>=', 'period_fecha_ini')->where($fecha, '<=', 'period_fecha_fin')->get();
        $period_id = 1;
        if (count($period) > 0)
        {
            $period_id = $period[0]->id;
        }

        $pol_id = $this->crearPoliza($comp_id, 'diario', $comp_atributos['total'], $comp_atributos['fecha'], $importada, 'POL/DIA/', $conc_pol, $period_id);

        //Generando asiento de cuenta por pagar
        $this->crearAsiento($pol_id, 'AST/XPAG/', $comp_atributos['total'], $conc_pol, "haber", $cta_x_pag);

        //Generando asiento de gasto
        $this->crearAsiento($pol_id, 'AST/GST/', $comp_atributos['subTotal'], $conc_pol, "debe", $cta_gast);

        //Generando asientos de impuestos
        $impuestos = $this->contabImp($pol_id, $conc_pol, $xml_array['cfdi:Comprobante']['cfdi:Impuestos'], 'debe', 'haber', $cta_iva_acred_x_cob, $cta_ieps_x_cob, $cta_isr_reten_x_cob, $cta_iva_reten_x_cob, $cta_ieps_reten_x_cob);

        //Generando asiento de descuento
        if (array_key_exists('Descuento',$comp_atributos) && isset($comp_atributos['Descuento']))
        {
            $this->crearAsiento($pol_id, 'AST/DESC/', $comp_atributos['Descuento'], $conc_pol, "haber", $cta_desc);
        }

        //Verificando si fue pagada en una sola exhibición
        if ($comp_atributos['MetodoPago'] == 'PUE')
        {
            $polpago_id = $this->crearPoliza($comp_id, 'egreso', $comp_atributos['total'], $comp_atributos['fecha'], $importada, 'POL/EGR/', $conc_pol, $period_id);

            //Generando cargo de cuenta por pagar
            $this->crearAsiento($polpago_id, 'AST/PAG/', $comp_atributos['total'], $conc_pol, "debe", $cta_x_pag);
            
            //Generando asiento de salida de dinero
            $forma_pago_cod = $comp_atributos['FormaPago'];
            $forma_pago = \FormaPago::where('formpago_formpagosat_cod', '=', $forma_pago_cod)->get();
            $cta_pago_id = \Cuenta::where('ctacont_efectivo','=',true)->get()[0];
            if (count($forma_pago) > 0)
            {
                $cta_pago_id = $forma_pago[0]->formpago_ctacont_id;
            }
            $this->crearAsiento($polpago_id, 'AST/PAG/', $comp_atributos['total'], $conc_pol, "haber", $cta_pago_id);

            //Generando asientos de reclasificación de impuestos
            $this->contabReclasifImp($pol_id, $conc_pol, $impuestos, 'haber', 'debe', $cta_iva_acred_x_cob, $cta_ieps_x_cob, $cta_isr_reten_x_cob, $cta_iva_reten_x_cob, $cta_ieps_reten_x_cob, $cta_iva_acred_cob, $cta_ieps_cob, $cta_isr_reten_cob, $cta_iva_reten_cob, $cta_ieps_reten_cob);
        }

    }

    

    public function contabImp($pol_id, $conc_pol, $nodo_imp, $apunte, $apunte1, $iva_t_a_xcob, $ieps_t_a_xcob, $isr_ret_xcob, $iva_ret_xcob, $ieps_ret_xcob)
    {
        $impuestos = [];
        
        if (array_key_exists('cfdi:Traslados',$nodo_imp) && isset($nodo_imp['cfdi:Traslados']))
        {
            if (array_key_exists('cfdi:Traslado',$nodo_imp['cfdi:Traslados']) && isset($nodo_imp['cfdi:Traslados']['cfdi:Traslado']))
            {
                $traslados = $nodo_imp['cfdi:Traslados']['cfdi:Traslado'];
                if (count($traslados) > 1)
                {
                    foreach ($traslados as $traslado) {
                        
                        switch ($traslado['@attributes']['Impuesto']) {
                            //IVA
                            case 002:
                                $this->crearAsiento($pol_id, 'AST/IVAXCOB/', $traslado['@attributes']['Importe'], $conc_pol, $apunte, $iva_t_a_xcob);
                                $impuestos['ivaxcob'] = $traslado['@attributes']['Importe'];
                                
                            //IEPS
                            case 003:
                                $this->crearAsiento($pol_id, 'AST/IEPSXCOB/', $traslado['@attributes']['Importe'], $conc_pol, $apunte, $ieps_t_a_xcob);
                                $impuestos['iepsxcob'] = $traslado['@attributes']['Importe'];

                            default: break;
                        }
                    }
                }
                else
                {
                    switch ($traslados['@attributes']['Impuesto']) {

                        //IVA
                        case 002:
                            $this->crearAsiento($pol_id, 'AST/IVAXCOB/', $traslados['@attributes']['Importe'], $conc_pol, $apunte, $iva_t_a_xcob);
                            
                            $impuestos['ivaxcob'] = $traslados['@attributes']['Importe'];

                        //IEPS
                        case 003:
                            $this->crearAsiento($pol_id, 'AST/IEPSXCOB/', $traslados['@attributes']['Importe'], $conc_pol, $apunte, $ieps_t_a_xcob);

                            $impuestos['iepsxcob'] = $traslados['@attributes']['Importe'];

                        default: break;
                    }

                }

            }

        }

        if (array_key_exists('cfdi:Retenciones',$nodo_imp) && isset($nodo_imp['cfdi:Retenciones']))
        {
            if (array_key_exists('cfdi:Retencion',$nodo_imp['cfdi:Retenciones']) && isset($nodo_imp['cfdi:Retenciones']['cfdi:Retencion']))
            {
                $retenciones = $nodo_imp['cfdi:Retenciones']['cfdi:Retencion'];
                if (count($retenciones) > 1)
                {
                    foreach ($retenciones as $retencion) {
                        
                        switch ($retencion['@attributes']['Impuesto']) {
                            //ISR
                            case 001:
                                $this->crearAsiento($pol_id, 'AST/ISRRXCOB/', $retencion['@attributes']['Importe'], $conc_pol, $apunte1, $isr_ret_xcob);

                                $impuestos['isrrxcob'] = $retencion['@attributes']['Importe'];
                            //IVA
                            case 002:
                                $this->crearAsiento($pol_id, 'AST/IVARXCOB/', $retencion['@attributes']['Importe'], $conc_pol, $apunte1, $iva_ret_xcob);
                               
                                $impuestos['ivarxcob'] = $retencion['@attributes']['Importe'];

                            //IEPS
                            case 003:
                                $this->crearAsiento($pol_id, 'AST/IEPSRXCOB/', $retencion['@attributes']['Importe'], $conc_pol, $apunte1, $ieps_ret_xcob);
                               
                                $impuestos['iepsrxcob'] = $retencion['@attributes']['Importe'];

                            default: break;
                        }

                    }

                }
                else
                {
                    switch ($retenciones['@attributes']['Impuesto']) {
                        //ISR
                        case 001:
                            $this->crearAsiento($pol_id, 'AST/ISRRXCOB/', $retenciones['@attributes']['Importe'], $conc_pol, $apunte1, $isr_ret_xcob);

                            $impuestos['isrrxcob'] = $retenciones['@attributes']['Importe'];
                        //IVA
                        case 002:
                            $this->crearAsiento($pol_id, 'AST/IVARXCOB/', $retenciones['@attributes']['Importe'], $conc_pol, $apunte1, $iva_ret_xcob);
                           
                            $impuestos['ivarxcob'] = $retenciones['@attributes']['Importe'];

                        //IEPS
                        case 003:
                            $this->crearAsiento($pol_id, 'AST/IEPSRXCOB/', $retenciones['@attributes']['Importe'], $conc_pol, $apunte1, $ieps_ret_xcob);
                            
                            $impuestos['iepsrxcob'] = $retenciones['@attributes']['Importe'];

                        default: break;
                    }
                }
            }
        }

        return $impuestos;
    }


    public function contabReclasifImp($pol_id, $conc_pol, $impuestos, $apunte, $apunte1, $iva_t_a_xcob, $ieps_t_a_xcob, $isr_ret_xcob, $iva_ret_xcob, $ieps_ret_xcob, $iva_t_a_cob, $ieps_t_a_cob, $isr_ret_cob, $iva_ret_cob, $ieps_ret_cob)
    {
        if (array_key_exists('ivaxcob',$impuestos))
        {
            $this->crearAsiento($pol_id, 'AST/IVATXCOB/', $monto_iva_trasl_x_cob, $conc_pol, $apunte, $iva_t_a_xcob);
            $this->crearAsiento($pol_id, 'AST/IVATCOB/', $monto_iva_trasl_x_cob, $conc_pol, $apunte1, $iva_t_a_cob);
        }

        if (array_key_exists('ivarxcob',$impuestos))
        {
            $this->crearAsiento($pol_id, 'AST/IVARXCOB/', $monto_iva_reten_x_cob, $conc_pol, $apunte1, $iva_ret_xcob);
            $this->crearAsiento($pol_id, 'AST/IVATCOB/', $monto_iva_reten_x_cob, $conc_pol, $apunte, $iva_ret_cob);
        }

        if (array_key_exists('isrrxcob',$impuestos))
        {
            $this->crearAsiento($pol_id, 'AST/ISRRXCOB/', $monto_isr_reten_x_cob, $conc_pol, $apunte1, $isr_ret_xcob);
            $this->crearAsiento($pol_id, 'AST/ISRTCOB/', $monto_isr_reten_x_cob, $conc_pol, $apunte, $isr_ret_cob);
        }

        if (array_key_exists('iepsxcob',$impuestos))
        {
            $this->crearAsiento($pol_id, 'AST/IEPSTXCOB/', $monto_ieps_x_cob, $conc_pol, $apunte, $ieps_t_a_xcob);
            $this->crearAsiento($pol_id, 'AST/IEPSTCOB/', $monto_ieps_x_cob, $conc_pol, $apunte1, $ieps_t_a_cob);

        }

        if (array_key_exists('iepsrxcob',$impuestos))
        {
            $this->crearAsiento($pol_id, 'AST/IEPSRXCOB/', $monto_ieps_reten_x_cob, $conc_pol, $apunte1, $ieps_ret_xcob);
            $this->crearAsiento($pol_id, 'AST/IEPSTCOB/', $monto_ieps_reten_x_cob, $conc_pol, $apunte, $ieps_ret_cob);
        }

    }

    public function crearAsiento($pol_id, $folio, $monto, $conc, $direc, $cta_id)
    {
        $cuenta = \Cuenta::find($cta_id);
        $asiento = new \Asiento;
        if ($direc == 'debe')
        {
            $cuenta->journal->debitDollars($monto);
            $asiento->asiento_debe = $monto;
            $asiento->asiento_haber = 0;
        }
        else
        {
            $cuenta->journal->creditDollars($monto);
            $asiento->asiento_debe = 0;
            $asiento->asiento_haber = $monto;
        }
        
        $asiento->asiento_concepto = $conc;
        $asiento->asiento_ctacont_id = $cta_id;
        $asiento->asiento_polz_id = $pol_id;
        $asiento->save();
        $asiento->asiento_folio_ref = $folio.$asiento->id;
        $asiento->save();
    }

    public function crearPoliza($comp_id, $tipo, $monto, $fecha, $importada, $folio, $conc, $period_id)
    {
        $pol = new \Poliza;
        $pol->polz_concepto = $conc;
        $pol->polz_tipopolz = $tipo;
        $pol->polz_fecha = $fecha;
        $pol->polz_importe = $monto;
        $pol->polz_importada = $importada;  
        $pol->polz_period_id = $period_id;      
        $pol->save();
        $pol->polz_folio = $folio.$pol->id;
        $pol->save();

        //Asociando póliza con comprobante
        $pol->comprobantes()->attach([$comp_id]);

        return $pol->id;

    }
    
}
