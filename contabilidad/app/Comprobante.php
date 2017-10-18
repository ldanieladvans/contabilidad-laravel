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

    public function contabIngreso($comp_id, $prov_id, $xml_array, $importada)
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

        $pol = new \Poliza;

        
        $clientes = \Cliente::where('cliente_rfc', '=', $rfc_cliente)->get();
        if (count($clientes) > 0)
        {
            $cliente = $clientes[0];
            if ($cliente->cliente_forma_contab == 'client')
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
        }
        else
        {
            //TODO check what happens if the client doesn't exists
        }

        //Generando póliza
        $pol->polz_concepto = $conc_pol;
        $pol->polz_tipopolz = 'diario';
        $fecha = $comp_atributos['fecha'];
        $pol->polz_fecha = $fecha;
        $pol->polz_importada = false;
        $pol->polz_importe = $comp_atributos['total'];
        if ($importada == true)
        {
            $pol->polz_importada = true;
        }

        //Identificando período
        $period = \Periodo::where('period_fecha_ini', '<=', $fecha, '&&', 'period_fecha_fin', '>=', $fecha)->get();
        if (count($period) > 0)
        {
            $pol->polz_period_id = $period[0]->id;
        }
        
        $pol->save();
        $pol->polz_folio = 'POL/DIARIO/'.$pol->id;
        $pol->save();

        //Asociando póliza de diario con comprobante
        $pol->comprobantes()->attach([$comp_id]);


        //Generando asiento de cuenta por cobrar
        $asiento_cta_x_cob = new \Asiento;
        $asiento_cta_x_cob->asiento_concepto = $conc_pol;
        $asiento_cta_x_cob->asiento_debe = $comp_atributos['total'];
        $asiento_cta_x_cob->asiento_haber = 0;
        $asiento_cta_x_cob->asiento_ctacont_id = $cta_x_cob;
        $asiento_cta_x_cob->asiento_polz_id = $pol->id;
        $asiento_cta_x_cob->save();
        $asiento_cta_x_cob->asiento_folio_ref = 'AST/X COB/'.$asiento_cta_x_cob->id;
        $asiento_cta_x_cob->save();

        //Generando asiento de INGRESO
        $asiento_cta_ing = new \Asiento;
        $asiento_cta_ing->asiento_concepto = $conc_pol;
        $asiento_cta_ing->asiento_debe = 0;
        $asiento_cta_ing->asiento_haber = $comp_atributos['subTotal'];
        $asiento_cta_ing->asiento_ctacont_id = $cta_ing;
        $asiento_cta_ing->asiento_polz_id = $pol->id;
        $asiento_cta_ing->save();
        $asiento_cta_ing->asiento_folio_ref = 'AST/ING/'.$asiento_cta_ing->id;
        $asiento_cta_ing->save();

        //Generando asientos de impuestos
        if (array_key_exists('cfdi:Impuestos',$xml_array['cfdi:Comprobante']) && isset($xml_array['cfdi:Comprobante']['cfdi:Impuestos']))
        {
            if (array_key_exists('cfdi:Traslados',$xml_array['cfdi:Comprobante']['cfdi:Impuestos']) && isset($xml_array['cfdi:Comprobante']['cfdi:Impuestos']['cfdi:Traslados']))
            {
                if (array_key_exists('cfdi:Traslado',$xml_array['cfdi:Comprobante']['cfdi:Impuestos']['cfdi:Traslados']) && isset($xml_array['cfdi:Comprobante']['cfdi:Impuestos']['cfdi:Traslados']['cfdi:Traslado']))
                {
                    $traslados = $xml_array['cfdi:Comprobante']['cfdi:Impuestos']['cfdi:Traslados']['cfdi:Traslado'];
                    if (count($traslados) > 1)
                    {
                        foreach ($traslados as $traslado) {
                            $asiento = new \Asiento;
                            $asiento->asiento_concepto = $conc_pol;
                            $asiento->asiento_debe = 0;
                            $asiento->asiento_haber = $traslado['@attributes']['Importe'];
                            $asiento->asiento_polz_id = $pol->id;
                            switch ($traslado['@attributes']['Impuesto']) {
                                //IVA
                                case 002:
                                    $asiento->asiento_ctacont_id = $cta_iva_trasl_x_cob;
                                    $asiento->save();
                                    $asiento->asiento_folio_ref = 'AST/IVA_TRAS_X_COB/'.$asiento->id;
                                    $asiento->save();
                                    $monto_iva_trasl_x_cob = $traslado['@attributes']['Importe'];

                                //IEPS
                                case 003:
                                    $asiento->asiento_ctacont_id = $cta_ieps_x_cob;
                                    $asiento->save();
                                    $asiento->asiento_folio_ref = 'AST/IEPS_TRAS_X_COB/'.$asiento->id;
                                    $asiento->save();
                                    $monto_ieps_x_cob = $traslado['@attributes']['Importe'];

                                default: break;
                            }
                        }

                    }
                    else
                    {
                        $asiento = new \Asiento;
                        $asiento->asiento_concepto = $conc_pol;
                        $asiento->asiento_debe = 0;
                        $asiento->asiento_haber = $traslados['@attributes']['Importe'];
                        $asiento->asiento_polz_id = $pol->id;
                        switch ($traslados['@attributes']['Impuesto']) {

                            //IVA
                            case 002:
                                $asiento->asiento_ctacont_id = $cta_iva_trasl_x_cob;
                                $asiento->save();
                                $asiento->asiento_folio_ref = 'AST/IVA_TRAS_X_COB/'.$asiento->id;
                                $asiento->save();
                                $monto_iva_trasl_x_cob = $traslados['@attributes']['Importe'];

                            //IEPS
                            case 003:
                                $asiento->asiento_ctacont_id = $cta_ieps_x_cob;
                                $asiento->save();
                                $asiento->asiento_folio_ref = 'AST/IEPS_TRAS_X_COB/'.$asiento->id;
                                $asiento->save();
                                $monto_ieps_x_cob = $traslados['@attributes']['Importe'];

                            default: break;
                        }

                    }

                }

            }

            if (array_key_exists('cfdi:Retenciones',$xml_array['cfdi:Comprobante']['cfdi:Impuestos']) && isset($xml_array['cfdi:Comprobante']['cfdi:Impuestos']['cfdi:Retenciones']))
            {
                if (array_key_exists('cfdi:Retencion',$xml_array['cfdi:Comprobante']['cfdi:Impuestos']['cfdi:Retenciones']) && isset($xml_array['cfdi:Comprobante']['cfdi:Impuestos']['cfdi:Retenciones']['cfdi:Retencion']))
                {
                    $retenciones = $xml_array['cfdi:Comprobante']['cfdi:Impuestos']['cfdi:Retenciones']['cfdi:Retencion'];
                    if (count($retenciones) > 1)
                    {
                        foreach ($retenciones as $retencion) {
                            $asiento = new \Asiento;
                            $asiento->asiento_concepto = $conc_pol;
                            $asiento->asiento_debe = $retencion['@attributes']['Importe'];
                            $asiento->asiento_haber = 0;
                            $asiento->asiento_polz_id = $pol->id;
                            switch ($retencion['@attributes']['Impuesto']) {
                                //ISR
                                case 001:
                                    $asiento->asiento_ctacont_id = $cta_isr_reten_x_cob;
                                    $asiento->save();
                                    $asiento->asiento_folio_ref = 'AST/ISR_RET_X_COB/'.$asiento->id;
                                    $monto_isr_reten_x_cob = $retencion['@attributes']['Importe'];
                                //IVA
                                case 002:
                                    $asiento->asiento_ctacont_id = $cta_iva_reten_x_cob;
                                    $asiento->save();
                                    $asiento->asiento_folio_ref = 'AST/IVA_RET_X_COB/'.$asiento->id;
                                    $monto_iva_reten_x_cob = $retencion['@attributes']['Importe'];

                                //IEPS
                                case 003:
                                    $asiento->asiento_ctacont_id = $cta_ieps_reten_x_cob;
                                    $asiento->save();
                                    $asiento->asiento_folio_ref = 'AST/IEPS_RET_X_COB/'.$asiento->id;
                                    $monto_ieps_reten_x_cob = $retencion['@attributes']['Importe'];

                                default: break;
                            }
                            $asiento->save();

                        }

                    }
                    else
                    {
                        $asiento = new \Asiento;
                        $asiento->asiento_concepto = $conc_pol;
                        $asiento->asiento_debe = $retenciones['@attributes']['Importe'];
                        $asiento->asiento_haber = 0;
                        $asiento->asiento_polz_id = $pol->id;
                        switch ($retenciones['@attributes']['Impuesto']) {
                            //ISR
                            case 001:
                                $asiento->asiento_ctacont_id = $cta_isr_reten_x_cob;
                                $asiento->save();
                                $asiento->asiento_folio_ref = 'AST/ISR_RET_X_COB/'.$asiento->id;
                                $monto_isr_reten_x_cob = $retenciones['@attributes']['Importe'];
                            //IVA
                            case 002:
                                $asiento->asiento_ctacont_id = $cta_iva_reten_x_cob;
                                $asiento->save();
                                $asiento->asiento_folio_ref = 'AST/IVA_RET_X_COB/'.$asiento->id;
                                $monto_iva_reten_x_cob = $retenciones['@attributes']['Importe'];

                            //IEPS
                            case 003:
                                $asiento->asiento_ctacont_id = $cta_ieps_reten_x_cob;
                                $asiento->save();
                                $asiento->asiento_folio_ref = 'AST/IEPS_RET_X_COB/'.$asiento->id;
                                $monto_ieps_reten_x_cob = $retenciones['@attributes']['Importe'];

                            default: break;
                        }
                        $asiento->save();
                    }

                }

            }
        
        }
        //Generando asiento de descuento
        if (array_key_exists('Descuento',$comp_atributos) && isset($comp_atributos['Descuento']))
        {
            $asiento = new \Asiento;
            $asiento->asiento_concepto = $conc_pol;
            $asiento->asiento_debe = $comp_atributos['Descuento'];
            $asiento->asiento_haber = 0;
            $asiento->asiento_polz_id = $pol->id;
            $asiento->asiento_ctacont_id = $cta_desc;
            $asiento->save();
            $asiento->asiento_folio_ref = 'AST/DESC/'.$asiento->id;
            $asiento->save();

        }

        //Verificando si fue pagada en una sola exhibición
        if ($comp_atributos['MetodoPago'] == 'PUE')
        {
            $polpago = new \Poliza;
            $polpago->polz_concepto = $conc_pol;
            $polpago->polz_tipopolz = 'ingreso';
            $polpago->polz_fecha = $pol->polz_fecha;
            $polpago->polz_importada = $pol->polz_importada;
            $polpago->polz_importe = $pol->polz_importe;
            $polpago->polz_period_id = $pol->polz_period_id;
            $polpago->save();
            $polpago->polz_folio = 'POL/INGR/'.$polpago->id;
            $polpago->save();

            //Asociando póliza de pago con mismo comprobante
            $polpago->comprobantes()->attach([$comp_id]);

            //Generando abono de cuenta por cobrar
            $asiento_abono_cta_x_cob = new \Asiento;
            $asiento_abono_cta_x_cob->asiento_concepto = $conc_pol;
            $asiento_abono_cta_x_cob->asiento_debe = 0;
            $asiento_abono_cta_x_cob->asiento_haber = $comp_atributos['total'];
            $asiento_abono_cta_x_cob->asiento_ctacont_id = $cta_x_cob;
            $asiento_abono_cta_x_cob->asiento_polz_id = $polpago->id;
            $asiento_abono_cta_x_cob->save();
            $asiento_abono_cta_x_cob->asiento_folio_ref = 'AST/COB/'.$asiento_abono_cta_x_cob->id;
            $asiento_abono_cta_x_cob->save();

            //Generando asiento de entrada de dinero
            $forma_pago_cod = $comp_atributos['FormaPago'];
            $forma_pago = \FormaPago::where('formpago_formpagosat_cod', '=', $forma_pago_cod)->get();
            $cta_pago_id = 1;
            if (count($forma_pago) > 0)
            {
                $cta_pago_id = $forma_pago[0]->formpago_ctacont_id;
            }
            $asiento_pago = new \Asiento;
            $asiento_pago->asiento_concepto = $conc_pol;
            $asiento_pago->asiento_debe = $comp_atributos['subTotal'];
            $asiento_pago->asiento_haber = 0;
            $asiento_pago->asiento_ctacont_id = $cta_pago_id;
            $asiento_pago->asiento_polz_id = $polpago->id;
            $asiento_pago->save();
            $asiento_pago->asiento_folio_ref = 'ASIENTO/PAG/'.$asiento_pago->id;
            $asiento_pago->save();

            //Generando asientos de impuestos


        }
    }


    
}
