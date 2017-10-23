<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Cliente;
use App\TipoCliente;
use App\Proveedor;
use App\TipoProveedor;
use App\Periodo;
use App\FormaPago;
use App\Cuenta;
use App\IngresosProducto;
use App\GastosProducto;
use App\Pagorel;
use App\Provision;
use App\ProvisionImpuestos;
use App\Asiento;
use App\Poliza;
use App\Balanza;

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

    public function getCuentas($rfc, $tipo)
    {
        $cuentas = [];
        if ($tipo == 'cliente')
        {
            $clientes = Cliente::where('cliente_rfc', '=', $rfc)->get();
            Log::info(\Session::get('selected_database','mysql'));
            Log::info($tipo);
            Log::info($rfc);
            Log::info($clientes);
            $cliente = $clientes[0];
            if ($cliente->cliente_forma_contab == 'cliente')
            {
                $cuentas['cta_puente'] = $cliente->cliente_cta_por_cobrar_id ? $cliente->cliente_cta_por_cobrar_id : 1;
                $cuentas['cta_nominal'] = $cliente->cliente_cta_ingreso_id ? $cliente->cliente_cta_ingreso_id : 1;
                $cuentas['cta_iva_trasl_x_cob'] = $cliente->cliente_cta_iva_traslad_x_cob_id ? $cliente->cliente_cta_iva_traslad_x_cob_id : 1;
                $cuentas['cta_iva_reten_x_cob'] = $cliente->cliente_cta_iva_reten_x_cob_id ? $cliente->cliente_cta_iva_reten_x_cob_id : 1;
                $cuentas['cta_isr_reten_x_cob'] = $cliente->cliente_cta_isr_reten_id ? $cliente->cliente_cta_isr_reten_id : 1;
                $cuentas['cta_desc'] = $cliente->cliente_cta_desc_id ? $cliente->cliente_cta_desc_id : 1;
                $cuentas['cta_ieps_x_cob'] = $cliente->cliente_cta_ieps_por_cobrar_id ? $cliente->cliente_cta_ieps_por_cobrar_id : 1;
                $cuentas['cta_ieps_reten_x_cob'] = $cliente->cliente_cta_ieps_reten_por_cobrar_id ? $cliente->cliente_cta_ieps_reten_por_cobrar_id : 1;
                $cuentas['conc_pol'] = $cliente->cliente_concepto_polz ? $cliente->cliente_concepto_polz : '';

                $cuentas['cta_iva_trasl_cob'] = $cliente->cliente_cta_iva_traslad_cob_id ? $cliente->cliente_cta_iva_traslad_cob_id : 1;
                $cuentas['cta_iva_reten_cob'] = $cliente->cliente_cta_iva_reten_cob_id ? $cliente->cliente_cta_iva_reten_cob_id : 1;
                $cuentas['cta_isr_reten_cob'] = $cliente->cliente_cta_isr_reten_cob_id ? $cliente->cliente_cta_isr_reten_cob_id : 1;
                $cuentas['cta_ieps_cob'] = $cliente->cliente_cta_ieps_cobrado_id ? $cliente->cliente_cta_ieps_cobrado_id : 1;
                $cuentas['cta_ieps_reten_cob'] = $cliente->cliente_cta_ieps_reten_cobrado_id ? $cliente->cliente_cta_ieps_reten_cobrado_id : 1;
                $cuentas['forma_contab'] = 'cliente';
                $cuentas['forma_contab_id'] = $cliente->id;
            }
            else
            {
                $tip_client = TipoCliente::find($cliente->cliente_tipcliente_id);

                $cuentas['cta_puente'] = $tip_client->tipcliente_cta_por_cobrar_id ? $tip_client->tipcliente_cta_por_cobrar_id : 1;
                $cuentas['cta_nominal'] = $tip_client->tipcliente_cta_ingreso_id ? $tip_client->tipcliente_cta_ingreso_id : 1;
                $cuentas['cta_iva_trasl_x_cob'] = $tip_client->tipcliente_cta_iva_traslad_x_cob_id ? $tip_client->tipcliente_cta_iva_traslad_x_cob_id : 1;
                $cuentas['cta_iva_reten_x_cob'] = $tip_client->tipcliente_cta_iva_reten_x_cob_id ? $tip_client->tipcliente_cta_iva_reten_x_cob_id : 1;
                $cuentas['cta_isr_reten_x_cob'] = $tip_client->tipcliente_cta_isr_reten_id ? $tip_client->tipcliente_cta_isr_reten_id : 1;
                $cuentas['cta_desc'] = $tip_client->tipcliente_cta_desc_id ? $tip_client->tipcliente_cta_desc_id : 1;
                $cuentas['cta_ieps_x_cob'] = $tip_client->tipcliente_cta_ieps_por_cobrar_id ? $tip_client->tipcliente_cta_ieps_por_cobrar_id : 1;
                $cuentas['cta_ieps_reten_x_cob'] = $tip_client->tipcliente_cta_ieps_reten_por_cobrar_id ? $tip_client->tipcliente_cta_ieps_reten_por_cobrar_id : 1;
                $cuentas['conc_pol'] = $tip_client->tipcliente_concpto_polz ? $tip_client->tipcliente_concpto_polz : '';

                $cuentas['cta_iva_trasl_cob'] = $tip_client->tipcliente_cta_iva_traslad_cob_id ? $tip_client->tipcliente_cta_iva_traslad_cob_id : 1;
                $cuentas['cta_iva_reten_cob'] = $tip_client->tipcliente_cta_iva_reten_cob_id ? $tip_client->tipcliente_cta_iva_reten_cob_id : 1;
                $cuentas['cta_isr_reten_cob'] = $tip_client->tipcliente_cta_isr_reten_cob_id ? $tip_client->tipcliente_cta_isr_reten_cob_id : 1;
                $cuentas['cta_ieps_cob'] = $tip_client->tipcliente_cta_ieps_cobrado_id ? $tip_client->tipcliente_cta_ieps_cobrado_id : 1;
                $cuentas['cta_ieps_reten_cob'] = $tip_client->tipcliente_cta_ieps_reten_cobrado_id ? $tip_client->tipcliente_cta_ieps_reten_cobrado_id : 1;
                $cuentas['forma_contab'] = 'tipocliente';
                $cuentas['forma_contab_id'] = $tip_client->id;
            }
        }
        else
        {
            $proveedores = Proveedor::where('proveed_rfc', '=', $rfc)->get();
            $proveedor = $proveedores[0];
            if ($proveedor->proveed_forma_contab == 'proveedor')
            {
                $cuentas['cta_puente']= $proveedor->proveed_cta_por_pagar_id ? $proveedor->proveed_cta_por_pagar_id : 1;
                $cuentas['cta_nominal']= $proveedor->proveed_cta_egreso_id ? $proveedor->proveed_cta_egreso_id : 1;
                $cuentas['cta_iva_trasl_x_cob']= $proveedor->proveed_cta_iva_acredit_x_cob_id ? $proveedor->proveed_cta_iva_acredit_x_cob_id : 1;
                $cuentas['cta_iva_reten_x_cob']= $proveedor->proveed_cta_iva_reten_x_cob_id ? $proveedor->proveed_cta_iva_reten_x_cob_id : 1;
                $cuentas['cta_isr_reten_x_cob']= $proveedor->proveed_cta_isr_reten_id ? $proveedor->proveed_cta_isr_reten_id : 1;
                $cuentas['cta_desc']= $proveedor->proveed_cta_desc_id ? $proveedor->proveed_cta_desc_id : 1;
                $cuentas['cta_ieps_x_cob']= $proveedor->proveed_cta_ieps_por_cobrar_id ? $proveedor->proveed_cta_ieps_por_cobrar_id : 1;
                $cuentas['cta_ieps_reten_x_cob']= $proveedor->proveed_cta_ieps_reten_por_cobrar_id ? $proveedor->proveed_cta_ieps_reten_por_cobrar_id : 1;
                $cuentas['conc_pol']= $proveedor->proveed_concepto_polz ? $proveedor->proveed_concepto_polz : '';

                $cuentas['cta_iva_trasl_cob']= $proveedor->proveed_cta_iva_acredit_cob_id ? $proveedor->proveed_cta_iva_acredit_cob_id : 1;
                $cuentas['cta_iva_reten_cob']= $proveedor->proveed_cta_iva_reten_cob_id ? $proveedor->proveed_cta_iva_reten_cob_id : 1;
                $cuentas['cta_isr_reten_cob']= $proveedor->proveed_cta_isr_reten_cob_id ? $proveedor->proveed_cta_isr_reten_cob_id : 1;
                $cuentas['cta_ieps_cob']= $proveedor->proveed_cta_ieps_cobrado_id ? $proveedor->proveed_cta_ieps_cobrado_id : 1;
                $cuentas['cta_ieps_reten_cob']= $proveedor->proveed_cta_ieps_reten_cobrado_id ? $proveedor->proveed_cta_ieps_reten_cobrado_id : 1;
                $cuentas['forma_contab'] = 'proveedor';
                $cuentas['forma_contab_id'] = $proveedor->id;

            }
            else
            {
                $tip_prov = TipoProveedor::find($proveedor->proveed_tipprov_id);

                $cuenta['cta_puente']= $tip_prov->tipprov_cta_por_pagar_id ? $tip_prov->tipprov_cta_por_pagar_id : 1;
                $cuenta['cta_nominal']= $tip_prov->tipprov_cta_egreso_id ? $tip_prov->tipprov_cta_egreso_id : 1;
                $cuenta['cta_iva_trasl_x_cob']= $tip_prov->tipprov_cta_iva_acredit_x_cob_id ? $tip_prov->tipprov_cta_iva_acredit_x_cob_id : 1;
                $cuenta['cta_iva_reten_x_cob']= $tip_prov->tipprov_cta_iva_reten_x_cob_id ? $tip_prov->tipprov_cta_iva_reten_x_cob_id : 1;
                $cuenta['cta_isr_reten_x_cob']= $tip_prov->tipprov_cta_isr_reten_id ? $tip_prov->tipprov_cta_isr_reten_id : 1;
                $cuenta['cta_desc']= $tip_prov->tipprov_cta_desc_id ? $tip_prov->tipprov_cta_desc_id : 1;
                $cuenta['cta_ieps_x_cob']= $tip_prov->tipprov_cta_ieps_por_cobrar_id ? $tip_prov->tipprov_cta_ieps_por_cobrar_id : 1;
                $cuenta['cta_ieps_reten_x_cob']= $tip_prov->tipprov_cta_ieps_reten_por_cobrar_id ? $tip_prov->tipprov_cta_ieps_reten_por_cobrar_id : 1;
                $cuenta['conc_pol']= $tip_prov->tipprov_concepto_polz ? $tip_prov->tipprov_concepto_polz : '';

                $cuenta['cta_iva_trasl_cob']= $tip_prov->tipprov_cta_iva_acredit_cob_id ? $tip_prov->tipprov_cta_iva_acredit_cob_id : 1;
                $cuenta['cta_iva_reten_cob']= $tip_prov->tipprov_cta_iva_reten_cob_id ? $tip_prov->tipprov_cta_iva_reten_cob_id : 1;
                $cuenta['cta_isr_reten_cob']= $tip_prov->tipprov_cta_isr_reten_cob_id ? $tip_prov->tipprov_cta_isr_reten_cob_id : 1;
                $cuenta['cta_ieps_cob']= $tip_prov->tipprov_cta_ieps_cobrado_id ? $tip_prov->tipprov_cta_ieps_cobrado_id : 1;
                $cuenta['cta_ieps_reten_cob']= $tip_prov->tipprov_cta_ieps_reten_cobrado_id ? $tip_prov->tipprov_cta_ieps_reten_cobrado_id : 1;
                $cuentas['forma_contab'] = 'tipoproveedor';
                $cuentas['forma_contab_id'] = $tip_prov->id;
            }
        }
        return $cuentas;
    }

    public function getPeriodo($fecha)
    {
        $period = Periodo::where('period_fecha_ini', '<=', $fecha)->where('period_fecha_fin', '>=', $fecha)->get();
        $period_id = 1;
        if (count($period) > 0)
        {
            $period_id = $period[0]->id;
        }

        return $period_id;
    }

    public function getCuentaPago($formapago)
    {
        $forma_pago = FormaPago::where('formpago_formpagosat_cod', '=', $formapago)->get();
        $cta_pago_id = Cuenta::where('ctacont_efectivo','=',true)->get()[0]->id;
        Log::info('forma pago');
        if (count($forma_pago) > 0)
        {
            if ($forma_pago[0]->formpago_ctacont_id)
            {
                $cta_pago_id = $forma_pago[0]->formpago_ctacont_id;
            }
            
        }
        Log::info($cta_pago_id);
        return $cta_pago_id;
    }

        
    public function contabProvis($comp_id, $provis_id, $xml_array, $importada, $tipo)
    {   

        $apunte = 'debe';
        $apunte1 = 'haber';
        $partner = 'cliente';
        $foliopuente = 'AST/XCOB';
        $folionominal = 'AST/ING';
        $foliopago = 'POL/ING';
        $rfc = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['Rfc'];

        if ($tipo == 'egreso')
        {
            $apunte = 'haber';
            $apunte1 = 'debe';
            $partner = 'proveedor';
            $foliopuente = 'AST/XPAG';
            $folionominal = 'AST/GST';
            $foliopago = 'POL/EGR';
            $rfc = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['Rfc'];
        }

        
        $comp_atributos = $xml_array['cfdi:Comprobante']['@attributes'];

        //Obteniendo cuentas y configuraciones para contabilización
        $cuentas = $this->getCuentas($rfc, $partner);
        Log::info($cuentas);
        
        //Identificando período
        $fecha = $comp_atributos['Fecha'];
        $period_id = $this->getPeriodo($fecha);
        if (!$period_id)
        {
            $period_id = 1;
        }

        Log::info('Periodo '.$period_id);
        
        //Generando póliza de diario
        $pol_id = $this->crearPoliza($comp_id, 'diario', $comp_atributos['Total'], $fecha, $importada, 'POL/DIA/', $cuentas['conc_pol'], $period_id);

        Log::info('Genero poliza de diario');

        //Generando asiento de puente (cuenta por cobrar o por pagar)
        $this->crearAsiento($pol_id, $foliopuente, $comp_atributos['Total'], $cuentas['conc_pol'], $apunte, $cuentas['cta_puente'], $period_id);

        Log::info('Genero asiento de cuenta por cobrar o pagar');

        //Generando asiento nominal (de ingreso o gasto)
        $conceptos = $xml_array['cfdi:Comprobante']['cfdi:Conceptos']['cfdi:Concepto'];
        $this->contabIngresoEgreso($tipo, $conceptos, $cuentas, $pol_id, $period_id);

        Log::info('Genero asiento de ingreso o gasto');

        //Generando asiento de descuento en caso de aplicar
        if (array_key_exists('Descuento',$comp_atributos) && isset($comp_atributos['Descuento']))
        {
            $this->crearAsiento($pol_id, 'AST/DESC/', $comp_atributos['Descuento'], $cuentas['conc_pol'], $apunte, $cuentas['cta_desc'], $period_id);
        }
        
        //Generando asientos de impuestos
        $impuestos = [];
        if (array_key_exists('cfdi:Impuestos',$xml_array['cfdi:Comprobante']) && isset($xml_array['cfdi:Comprobante']['cfdi:Impuestos']))
        {
            $impuestos = $this->contabImp($pol_id, $cuentas['conc_pol'], $xml_array['cfdi:Comprobante']['cfdi:Impuestos'], $apunte1, $apunte, $cuentas['cta_iva_trasl_x_cob'], $cuentas['cta_ieps_x_cob'], $cuentas['cta_isr_reten_x_cob'], $cuentas['cta_iva_reten_x_cob'], $cuentas['cta_ieps_reten_x_cob'], $period_id);
        }

        Log::info('Genero asientos de impuestos');

        //Actualizando impuestos de provisión
        if (count($impuestos) > 0)
        {
            $this->actImpProv($provis_id, $impuestos);
        }

        //Verificando si fue pagada en una sola exhibición
        if ($comp_atributos['MetodoPago'] == 'PUE')
        {
            $polpago_id = $this->crearPoliza($comp_id, $tipo, $comp_atributos['Total'], $fecha, $importada, $foliopago, $cuentas['conc_pol'], $period_id);

            //Generando cierre de cuenta puente
            $this->crearAsiento($polpago_id, $foliopuente, $comp_atributos['Total'], $cuentas['conc_pol'], $apunte1, $cuentas['cta_puente'], $period_id);
            
            //Tomando cuenta para pago
            $forma_pago_cod = $comp_atributos['FormaPago'];
            $cta_pago_id = $this->getCuentaPago($forma_pago_cod);
            
            //Generando asiento de pago
            $this->crearAsiento($polpago_id, 'AST/PAG/', $comp_atributos['Total'], $cuentas['conc_pol'], $apunte, $cta_pago_id, $period_id);

            //Generando asientos de reclasificación de impuestos
            if (count($impuestos) > 0)
            {
                $this->contabReclasifImp($polpago_id, $cuentas['conc_pol'], $impuestos, $apunte, $apunte1, $cuentas['cta_iva_trasl_x_cob'], $cuentas['cta_ieps_x_cob'], $cuentas['cta_isr_reten_x_cob'], $cuentas['cta_iva_reten_x_cob'], $cuentas['cta_ieps_reten_x_cob'], $cuentas['cta_iva_trasl_cob'], $cuentas['cta_ieps_cob'], $cuentas['cta_isr_reten_cob'], $cuentas['cta_iva_reten_cob'], $cuentas['cta_ieps_reten_cob'], $period_id);
            }
        }
    }

    public function contabIngresoEgreso($tipo, $conceptos, $cuentas, $pol_id, $period_id)
    {
        $forma_contab = $cuentas['forma_contab'];
        $cuentas_nominales = [];
        if ($tipo == 'ingreso')
        {
            $folio = 'AST/ING';
            $apunte = 'haber';
            
            if ($forma_contab == 'cliente')
            {
                $cuentas_ingreso = IngresosProducto::where('prodingr_cliente_id','=',$cuentas['forma_contab_id'])->get();
            }
            else
            {
                $cuentas_ingreso = IngresosProducto::where('prodingr_tipcliente_id','=',$cuentas['forma_contab_id'])->get();
            }

            foreach ($cuentas_ingreso as $cta) {
                $cuentas_nominales[$cta->prodingr_cod_prod] = $cta->prodingr_cta_ingr_id;
            }

        }
        else
        {
            $folio = 'AST/GST';
            $apunte = 'debe';
            if ($forma_contab == 'proveedor')
            {
                $cuentas_gastos = GastosProducto::where('prodgast_proveed_id','=',$cuentas['forma_contab_id'])->get();
            }
            else
            {
                $cuentas_gastos = GastosProducto::where('prodgast_tipprov_id','=',$cuentas['forma_contab_id'])->get();
            }

            foreach ($cuentas_gastos as $cta) {
                $cuentas_nominales[$cta->prodgast_cod_prod] = $cta->prodgast_cta_gast_id;
            }

        }

        $cta_nom = $cuentas['cta_nominal'];

        Log::info($conceptos['@attributes']);
        Log::info($conceptos);
        Log::info(count($conceptos['@attributes']));

        if (count($conceptos) > 2)
        {
            foreach ($conceptos as $concepto) {
                $claveProdServ = $concepto['@attributes']['ClaveProdServ'];

                if (array_key_exists($claveProdServ, $cuentas_nominales))
                {
                    $cta_nom = $cuentas_nominales[$claveProdServ];
                }

                $this->crearAsiento($pol_id, $folio, $concepto['Importe'], $claveProdServ, $apunte, $cta_nom, $period_id);
            }
        }
        else
        {
            $claveProdServ = $conceptos['@attributes']['ClaveProdServ'];

                if (array_key_exists($claveProdServ, $cuentas_nominales))
                {
                    $cta_nom = $cuentas_nominales[$claveProdServ];
                }

                $this->crearAsiento($pol_id, $folio, $conceptos['@attributes']['Importe'], $claveProdServ, $apunte, $cta_nom, $period_id);

        }

    }

    public function contabPago($comp_id, $array_pagos, $rfc, $importada, $tipo)
    {
        $partner = 'cliente';
        $foliopol = 'POL/ING';
        $foliopago = 'AST/COB';
        $foliopuente = 'AST/XCOB';
        $apunte = 'debe';
        $apunte1 = 'haber';
        if ($tipo == 'egreso')
        {
            $partner = 'proveedor';
            $foliopol = 'POL/EGR';
            $foliopago = 'AST/PAG';
            $foliopuente = 'AST/XPAG';
            $apunte = 'haber';
            $apunte1 = 'debe';
        }
        
        $cuentas = $this->getCuentas($rfc, $partner);
        foreach ($array_pagos as $pago) {
            
            $period_id = $this->getPeriodo($pago->pago_fecha);
            $cuenta_pago_id = $this->getCuentaPago($pago->pago_formpago_cod);
            
            //Generando póliza de pago
            $pol_id = $this->crearPoliza($comp_id, $tipo, $pago->pago_monto, $pago->pago_fecha, $importada, $foliopol, $cuentas['conc_pol'], $period_id);
            
            //Generando asiento de pago
            $this->crearAsiento($pol_id, $foliopago, $pago->pago_monto, $cuentas['conc_pol'], $apunte, $cuenta_pago_id, $period_id);

            //Generando asientos de cuentas por cobrar por cada documento relacionado dentro de pago
            //y verificando la reclasificación de impuestos por cada documento relacionado
            $docs_rel = Pagorel::where('pagorel_pago_id','=',$pago->id)->get();
            foreach ($docs_rel as $doc) {

                $this->crearAsiento($pol_id, $foliopuente, $doc->pagorel_monto_pag, $cuentas['conc_pol'], $apunte1, $cuentas['cta_puente'], $period_id);

                $comp_rel = Comprobante::where('comp_uuid','=',$doc->pagorel_pagado_uuid)->get();

                if (count($comp_rel) > 0)
                {
                    $comp = $comp_rel[0];
                    $provis = Provision::where('provis_comp_id','=',$comp->id)->get();
                    if (count($provis) > 0)
                    {
                        $provis = $provis[0];
                        $provis_monto = $provis->provis_monto;
                        $porcentaje_pagado = round($doc->pagorel_monto_pag / $provis_monto, 2);
                        $provis_impuestos = ProvisionImpuestos::where('provisimp_provis_id','=',$provis->id)->get();
                        $impuestos = [];

                        foreach ($provis_impuestos as $imp) {
                            if ($imp->provisimp_tipo == 't')
                            {
                                switch ($imp->provisimp_cod) {
                                    case '002':
                                        $impuestos['ivaxcob'] = $imp->provisimp_monto * $porcentaje_pagado;
                                        break;

                                    case '003':
                                        $impuestos['iepsxcob'] = $imp->provisimp_monto * $porcentaje_pagado;
                                        break;
                                    
                                    default:
                                        # code...
                                        break;
                                }
                            }
                            else
                            {
                                switch ($imp->provisimp_cod) {
                                    case '001':
                                        $impuestos['isrrxcob'] = $imp->provisimp_monto * $porcentaje_pagado;
                                        break;

                                    case '002':
                                        $impuestos['ivarxcob'] = $imp->provisimp_monto * $porcentaje_pagado;
                                        break;

                                    case '003':
                                        $impuestos['iepsrxcob'] = $imp->provisimp_monto * $porcentaje_pagado;
                                        break;
                                    
                                    default:
                                        # code...
                                        break;
                                }
                            }
                        }

                        $this->contabReclasifImp($pol_id, $cuentas['conc_pol'], $impuestos, $apunte, $apunte1, $cuentas['cta_iva_trasl_x_cob'], $cuentas['cta_ieps_x_cob'], $cuentas['cta_isr_reten_x_cob'], $cuentas['cta_iva_reten_x_cob'], $cuentas['cta_ieps_reten_x_cob'], $cuentas['cta_iva_trasl_cob'], $cuentas['cta_ieps_cob'], $cuentas['cta_isr_reten_cob'], $cuentas['cta_iva_reten_cob'], $cuentas['cta_ieps_reten_cob'], $period_id);
                    }
                }
            }
        }
    }

    
    public function contabImp($pol_id, $conc_pol, $nodo_imp, $apunte, $apunte1, $iva_t_a_xcob, $ieps_t_a_xcob, $isr_ret_xcob, $iva_ret_xcob, $ieps_ret_xcob, $period_id)
    {
        $impuestos = [];
        
        if (array_key_exists('cfdi:Traslados',$nodo_imp) && isset($nodo_imp['cfdi:Traslados']))
        {
            if (array_key_exists('cfdi:Traslado',$nodo_imp['cfdi:Traslados']) && isset($nodo_imp['cfdi:Traslados']['cfdi:Traslado']))
            {
                $traslados = $nodo_imp['cfdi:Traslados']['cfdi:Traslado'];
                if (count($traslados) > 2)
                {
                    foreach ($traslados as $traslado) {
                        
                        switch ($traslado['@attributes']['Impuesto']) {
                            //IVA
                            case '002':
                                $this->crearAsiento($pol_id, 'AST/IVAXCOB/', $traslado['@attributes']['Importe'], $conc_pol, $apunte, $iva_t_a_xcob, $period_id);
                                $impuestos['ivaxcob'] = $traslado['@attributes']['Importe'];
                                break;
                                
                            //IEPS
                            case '003':
                                $this->crearAsiento($pol_id, 'AST/IEPSXCOB/', $traslado['@attributes']['Importe'], $conc_pol, $apunte, $ieps_t_a_xcob, $period_id);
                                $impuestos['iepsxcob'] = $traslado['@attributes']['Importe'];
                                break;

                            default: break;
                        }
                    }
                }
                else
                {
                    switch ($traslados['@attributes']['Impuesto']) {

                        //IVA
                        case '002':
                            $this->crearAsiento($pol_id, 'AST/IVAXCOB/', $traslados['@attributes']['Importe'], $conc_pol, $apunte, $iva_t_a_xcob, $period_id);
                            
                            $impuestos['ivaxcob'] = $traslados['@attributes']['Importe'];
                            break;

                        //IEPS
                        case '003':
                            $this->crearAsiento($pol_id, 'AST/IEPSXCOB/', $traslados['@attributes']['Importe'], $conc_pol, $apunte, $ieps_t_a_xcob, $period_id);

                            $impuestos['iepsxcob'] = $traslados['@attributes']['Importe'];
                            break;

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
                if (count($retenciones) > 2)
                {
                    foreach ($retenciones as $retencion) {
                        
                        switch ($retencion['@attributes']['Impuesto']) {
                            //ISR
                            case '001':
                                $this->crearAsiento($pol_id, 'AST/ISRRXCOB/', $retencion['@attributes']['Importe'], $conc_pol, $apunte1, $isr_ret_xcob, $period_id);

                                $impuestos['isrrxcob'] = $retencion['@attributes']['Importe'];
                                break;
                            //IVA
                            case '002':
                                $this->crearAsiento($pol_id, 'AST/IVARXCOB/', $retencion['@attributes']['Importe'], $conc_pol, $apunte1, $iva_ret_xcob, $period_id);
                               
                                $impuestos['ivarxcob'] = $retencion['@attributes']['Importe'];
                                break;

                            //IEPS
                            case '003':
                                $this->crearAsiento($pol_id, 'AST/IEPSRXCOB/', $retencion['@attributes']['Importe'], $conc_pol, $apunte1, $ieps_ret_xcob, $period_id);
                               
                                $impuestos['iepsrxcob'] = $retencion['@attributes']['Importe'];
                                break;

                            default: break;
                        }

                    }

                }
                else
                {
                    switch ($retenciones['@attributes']['Impuesto']) {
                        //ISR
                        case '001':
                            $this->crearAsiento($pol_id, 'AST/ISRRXCOB/', $retenciones['@attributes']['Importe'], $conc_pol, $apunte1, $isr_ret_xcob, $period_id);

                            $impuestos['isrrxcob'] = $retenciones['@attributes']['Importe'];
                            break;
                        //IVA
                        case '002':
                            $this->crearAsiento($pol_id, 'AST/IVARXCOB/', $retenciones['@attributes']['Importe'], $conc_pol, $apunte1, $iva_ret_xcob, $period_id);
                           
                            $impuestos['ivarxcob'] = $retenciones['@attributes']['Importe'];
                            break;

                        //IEPS
                        case '003':
                            $this->crearAsiento($pol_id, 'AST/IEPSRXCOB/', $retenciones['@attributes']['Importe'], $conc_pol, $apunte1, $ieps_ret_xcob, $period_id);
                            
                            $impuestos['iepsrxcob'] = $retenciones['@attributes']['Importe'];
                            break;

                        default: break;
                    }
                }
            }
        }

        return $impuestos;
    }

    public function actImpProv($provis_id, $impuestos)
    {
        foreach ($impuestos as $key => $value) {
            $provimp = new ProvisionImpuestos();
            switch ($key) {
                case 'ivaxcob':
                    $provimp->provisimp_tipo = 't';
                    $provimp->provisimp_cod = '002';
                    $provimp->provisimp_monto = $value;
                    $provimp->provisimp_provis_id = $provis_id;
                    $provimp->save();
                    
                    break;

                case 'ivarxcob':
                    $provimp->provisimp_tipo = 'r';
                    $provimp->provisimp_cod = '002';
                    $provimp->provisimp_monto = $value;
                    $provimp->provisimp_provis_id = $provis_id;
                    $provimp->save();
                    break;

                case 'isrrxcob':
                    $provimp->provisimp_tipo = 'r';
                    $provimp->provisimp_cod = '001';
                    $provimp->provisimp_monto = $value;
                    $provimp->provisimp_provis_id = $provis_id;
                    $provimp->save();
                    break;

                case 'iepsxcob':
                    $provimp->provisimp_tipo = 't';
                    $provimp->provisimp_cod = '003';
                    $provimp->provisimp_monto = $value;
                    $provimp->provisimp_provis_id = $provis_id;
                    $provimp->save();
                    break;

                case 'iepsrxcob':
                    $provimp->provisimp_tipo = 'r';
                    $provimp->provisimp_cod = '003';
                    $provimp->provisimp_monto = $value;
                    $provimp->provisimp_provis_id = $provis_id;
                    $provimp->save();
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }


    public function contabReclasifImp($pol_id, $conc_pol, $impuestos, $apunte, $apunte1, $iva_t_a_xcob, $ieps_t_a_xcob, $isr_ret_xcob, $iva_ret_xcob, $ieps_ret_xcob, $iva_t_a_cob, $ieps_t_a_cob, $isr_ret_cob, $iva_ret_cob, $ieps_ret_cob, $period_id)
    {
        if (array_key_exists('ivaxcob',$impuestos))
        {
            $this->crearAsiento($pol_id, 'AST/IVATXCOB/', $impuestos['ivaxcob'], $conc_pol, $apunte, $iva_t_a_xcob, $period_id);
            $this->crearAsiento($pol_id, 'AST/IVATCOB/', $impuestos['ivaxcob'], $conc_pol, $apunte1, $iva_t_a_cob, $period_id);
        }

        if (array_key_exists('ivarxcob',$impuestos))
        {
            $this->crearAsiento($pol_id, 'AST/IVARXCOB/', $impuestos['ivarxcob'], $conc_pol, $apunte1, $iva_ret_xcob, $period_id);
            $this->crearAsiento($pol_id, 'AST/IVARTCOB/', $impuestos['ivarxcob'], $conc_pol, $apunte, $iva_ret_cob, $period_id);
        }

        if (array_key_exists('isrrxcob',$impuestos))
        {
            $this->crearAsiento($pol_id, 'AST/ISRRXCOB/', $impuestos['isrrxcob'], $conc_pol, $apunte1, $isr_ret_xcob, $period_id);
            $this->crearAsiento($pol_id, 'AST/ISRRCOB/', $impuestos['isrrxcob'], $conc_pol, $apunte, $isr_ret_cob, $period_id);
        }

        if (array_key_exists('iepsxcob',$impuestos))
        {
            $this->crearAsiento($pol_id, 'AST/IEPSTXCOB/', $impuestos['iepsxcob'], $conc_pol, $apunte, $ieps_t_a_xcob, $period_id);
            $this->crearAsiento($pol_id, 'AST/IEPSTCOB/', $impuestos['iepsxcob'], $conc_pol, $apunte1, $ieps_t_a_cob, $period_id);

        }

        if (array_key_exists('iepsrxcob',$impuestos))
        {
            $this->crearAsiento($pol_id, 'AST/IEPSRXCOB/', $impuestos['iepsrxcob'], $conc_pol, $apunte1, $ieps_ret_xcob, $period_id);
            $this->crearAsiento($pol_id, 'AST/IEPSRCOB/', $impuestos['iepsrxcob'], $conc_pol, $apunte, $ieps_ret_cob, $period_id);
        }

    }

    public function crearAsiento($pol_id, $folio, $monto, $conc, $direc, $cta_id, $period_id)
    {
        $cuenta = Cuenta::find($cta_id);
        if ($cuenta)
        {
            $asiento = new Asiento;
            $cuentas_en_blz = Balanza::where('blnza_period_id','=',$period_id)->where('blnza_ctacont_id', '=', $cta_id)->get();

            if (count($cuentas_en_blz) == 0)
            {
                $this->insertarBalanza($cuenta, $period_id);
            }

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
        

        $this->updateBalanza($cuenta, $period_id, $monto, $direc);

    }

    public function insertarBalanza($cuenta, $period_id)
    {
        $saldo_ini = $cuenta->journal->getCurrentBalanceInDollars();
        $balanza = new Balanza();
        $balanza->blnza_saldo_inicial = $saldo_ini;
        $balanza->blnza_cargos = 0;
        $balanza->blnza_abonos = 0;
        $balanza->blnza_saldo_final = $saldo_ini;
        $balanza->blnza_period_id = $period_id;
        $balanza->blnza_ctacont_id = $cuenta->id;
    }

    public function updateBalanza($cuenta, $period_id, $monto, $direc)
    {
        $cuenta_blz = Balanza::where('blnza_period_id','=',$period_id)->where('blnza_ctacont_id', '=', $cuenta->id)->get();
        if (count($cuenta_blz) > 0)
        {
            $blz = $cuenta_blz[0];
            if ($direc == 'debe')
            {
                $blz->blnza_cargos += $monto;
            }
            else
            {
                $blz->blnza_abonos += $monto;
            }

            $blz->blnza_saldo_final = $cuenta->journal->getCurrentBalanceInDollars();
            $blz->save();
        }
    }

    public function crearPoliza($comp_id, $tipo, $monto, $fecha, $importada, $folio, $conc, $period_id)
    {
        $pol = new Poliza;
        Log::info($conc);
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

    public function updateBalanza($cta_id, $period_id, $monto, $apunte)
    {
        //TODO ACTUALIZAR BALANZA POR CADA ASIENTO CONTABLE

    }
    
}
