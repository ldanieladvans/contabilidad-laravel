<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompProces;
use App\Pago;
use App\Pagorel;
use App\Cuenta;
use App\Poliza;
use App\Comprobante;
use App\ComprobanteRel;
use App\Nomina;
use App\Provision;
use App\Cliente;
use App\Proveedor;
use App\FormaPago;
use App\Empresa;
use App\Direccion;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Lib\XML2Array;
use SoapClient;

class SubeCompController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('appviews.subecomp',[]);
    }

    public function addComp(Request $request){

    	$target_dir = base_path().DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR;
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		$logued_user = Auth::user();

		$exist_file = CompProces::where('user_id',$logued_user->id)->where('filename',$_FILES['file']['name'])->where('process',false)->get();

		if(count($exist_file)==0){
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.(string)$logued_user->id.'_'.$_FILES['file']['name'])) {
				$status = 1;
			}
			$new_file_entry = new CompProces(['user_id'=>$logued_user->id,'filename'=>$_FILES['file']['name']]);
			$new_file_entry->save();
		}

    }


    public function ingresoEgreso($xml_array,$comprobante,$type){

        
        $provision = new Provision();
        if(array_key_exists('@attributes', $xml_array['cfdi:Comprobante'])){
            $provision->provis_monto = $xml_array['cfdi:Comprobante']['@attributes']['Total'];
            $provision->provis_moneda_cod = $xml_array['cfdi:Comprobante']['@attributes']['Moneda'];
            $provision->provis_moneda_nom = $xml_array['cfdi:Comprobante']['@attributes']['Moneda'];
            $provision->provis_tipo_cambio = 0.0; //TODO
            $provision->provis_metpago_cod = $xml_array['cfdi:Comprobante']['@attributes']['MetodoPago'];
            $provision->provis_formpago_cod = $xml_array['cfdi:Comprobante']['@attributes']['FormaPago'];
            if($comprobante->id){
                $provision->provis_comp_id = $comprobante->id;
            }
            $provision->save();
        }
        

        if(array_key_exists('cfdi:CfdiRelacionados', $xml_array['cfdi:Comprobante'])){
            foreach ($xml_array['cfdi:Comprobante']['cfdi:CfdiRelacionados'] as $key => $value) {
                $comprel = new ComprobanteRel();
                $comprel->comprel_tiporel_cod = $xml_array['cfdi:Comprobante']['cfdi:CfdiRelacionados']['@attributes']['TipoRelacion'];
                $comprel->comprel_tiporel_nom = $xml_array['cfdi:Comprobante']['cfdi:CfdiRelacionados']['@attributes']['TipoRelacion'];
                $comprel->comprel_comp_rel_uuid = $value['@attributes']['UUID'];
                $comprel->save();
            }

        }

        $comprobante->contabProvis($comprobante->id, $provision->id, $xml_array, true, $type);

    }


    public function ingresoEgreso32($xml_array,$comprobante,$type){

        
        $provision = new Provision();
        if(array_key_exists('@attributes', $xml_array['cfdi:Comprobante'])){
            $provision->provis_monto = $xml_array['cfdi:Comprobante']['@attributes']['total'];
            $provision->provis_tipo_cambio = 0.0; //TODO
            $provision->provis_metpago_cod = $xml_array['cfdi:Comprobante']['@attributes']['metodoDePago'];
            $provision->provis_formpago_cod = $xml_array['cfdi:Comprobante']['@attributes']['formaDePago'];
            if($comprobante->id){
                $provision->provis_comp_id = $comprobante->id;
            }
            $provision->save();
        }
        

        /*if(array_key_exists('cfdi:CfdiRelacionados', $xml_array['cfdi:Comprobante'])){
            foreach ($xml_array['cfdi:Comprobante']['cfdi:CfdiRelacionados'] as $key => $value) {
                $comprel = new ComprobanteRel();
                $comprel->comprel_tiporel_cod = $xml_array['cfdi:Comprobante']['cfdi:CfdiRelacionados']['@attributes']['TipoRelacion'];
                $comprel->comprel_tiporel_nom = $xml_array['cfdi:Comprobante']['cfdi:CfdiRelacionados']['@attributes']['TipoRelacion'];
                $comprel->comprel_comp_rel_uuid = $value['@attributes']['UUID'];
                $comprel->save();
            }

        }*/

        $comprobante->contabProvis32($comprobante->id, $provision->id, $xml_array, true, $type);

    }


    public function pago($xml_array,$comprobante,$ptype,$rfc_param){
        $fpagos_arr = array();
        $pagos_arr = array();
        $fpagos = FormaPago::all();
        foreach ($fpagos as $fpg) {
            $fpagos_arr[$fpg->formpago_formpagosat_cod] = $fpg->formpago_formpagosat_nom;
        }

        if(array_key_exists('cfdi:Complemento', $xml_array['cfdi:Comprobante'])){
            if(array_key_exists('pago10:Pagos', $xml_array['cfdi:Comprobante']['cfdi:Complemento'])){
                foreach ($xml_array['cfdi:Comprobante']['cfdi:Complemento']['pago10:Pagos'] as $pkey => $pvalue) {
                    Log::info($pvalue);
                    if(array_key_exists('Version',$pvalue)){
                        break;
                    }
                    $pattributes = $pvalue['@attributes'];
                    
                    $pago = new Pago();
                    $pago->pago_monto = (float)$pattributes['Monto'];
                    $pago->pago_fecha = date('Y-m-d H:i:s',strtotime($pattributes['FechaPago']));
                    $pago->pago_formpago_cod = $pattributes['FormaDePagoP'];
                    $pago->pago_formpago_nom = $fpagos_arr[$pattributes['FormaDePagoP']];
                    $pago->pago_moneda_cod = $pattributes['MonedaP'];
                    $pago->pago_moneda_nom = $pattributes['MonedaP'];

                    if(array_key_exists('TipoCambioP',$pattributes)){
                        $pago->pago_tipo_cambio = (float)$pattributes['TipoCambioP'];
                    }

                    if(array_key_exists('NumOperacion',$pattributes)){
                        $pago->pago_numoperc = $pattributes['NumOperacion'];
                    }

                    if(array_key_exists('RfcEmisorCtaOrd',$pattributes)){
                        $pago->pago_rfcemisor_ctaord = $pattributes['RfcEmisorCtaOrd'];
                    }

                    if(array_key_exists('NomBancoOrdExt',$pattributes)){
                        $pago->pago_nombanc_ordext = $pattributes['NomBancoOrdExt'];
                    }

                    if(array_key_exists('CtaOrdenante',$pattributes)){
                        $pago->pago_cta_ordnte = $pattributes['CtaOrdenante'];
                    }

                    if(array_key_exists('RfcEmisorCtaBen',$pattributes)){
                        $pago->pago_rfcrecept_ctaben = $pattributes['RfcEmisorCtaBen'];
                    }

                    if(array_key_exists('CtaBeneficiario',$pattributes)){
                        $pago->pago_cta_ben = $pattributes['CtaBeneficiario'];
                    }

                    if(array_key_exists('CertPago',$pattributes)){
                        $pago->pago_cert_pago = $pattributes['CertPago'];
                    }

                    if(array_key_exists('SelloPago',$pattributes)){
                        $pago->pago_sello_pago = $pattributes['SelloPago'];
                    }

                    $pago->pago_comp_id = $comprobante->id;
                    $pago->save();

                    array_push($pagos_arr,$pago);

                    
                    foreach ($pvalue['pago10:DoctoRelacionado'] as $key => $value) {
                        if($key == '@attributes'){
                            $pagorel = new Pagorel();
                            $pagorel->pagorel_pagado_uuid = $value['IdDocumento'];
                            $pagorel->pagorel_moneda_cod = $value['MonedaDR'];
                            $pagorel->pagorel_moneda_nom = $value['MonedaDR'];
                            $pagorel->pagorel_metpago_cod = $value['MetodoDePagoDR'];
                            $pagorel->pagorel_metpago_nom = $value['MetodoDePagoDR']; //TODO buscar nombre en catalogo central
                            if($pago->pago_tipo_cambio){
                                $pagorel->pagorel_tipo_cambio = $pago->pago_tipo_cambio;
                            }

                            if(array_key_exists('NumParcialidad',$value)){
                                $pagorel->pagorel_numparcldad = $value['NumParcialidad'];
                            }

                            $pagorel->pagorel_monto_pag = $pago->pago_monto;
                            if(array_key_exists('ImpPagado',$value)){
                                $pagorel->pagorel_monto_pag = (float)$value['ImpPagado'];
                            }

                            if(array_key_exists('ImpSaldoAnt',$value)){
                                $pagorel->pagorel_sald_ant = (float)$value['ImpSaldoAnt'];
                            }

                            if(array_key_exists('ImpSaldoInsoluto',$value)){
                                $pagorel->pagorel_sald_nuevo = (float)$value['ImpSaldoInsoluto'];
                            }

                            if(array_key_exists('Serie',$value)){
                                $pagorel->pagorel_serie = $value['Serie'];
                            }

                            if(array_key_exists('Folio',$value)){
                                $pagorel->pagorel_folio = $value['Folio'];
                            }

                            $pagorel->pagorel_pago_id = $pago->id;

                            $pagorel->save();
                        }
                    }
                }
            }
        }

        $comprobante->contabPago($comprobante->id, $pagos_arr, $rfc_param, false, $ptype);
    }


    
    public function processFile32($xml_array,$alldata,$ef){
        $comprobante = new Comprobante();
        if(array_key_exists('cfdi:Complemento', $xml_array['cfdi:Comprobante'])){
            if(array_key_exists('tfd:TimbreFiscalDigital', $xml_array['cfdi:Comprobante']['cfdi:Complemento'])){
                if(array_key_exists('@attributes', $xml_array['cfdi:Comprobante']['cfdi:Complemento']['tfd:TimbreFiscalDigital'])){
                    $comprobante->comp_uuid = $xml_array['cfdi:Comprobante']['cfdi:Complemento']['tfd:TimbreFiscalDigital']['@attributes']['UUID'];
                }
            }
        }

        if($xml_array['cfdi:Comprobante']['@attributes']){
            if(array_key_exists('fecha', $xml_array['cfdi:Comprobante']['@attributes'])){
                $comprobante->comp_f_emision = date('Y-m-d H:i:s',strtotime($xml_array['cfdi:Comprobante']['@attributes']['fecha']));
            }

            if(array_key_exists('serie', $xml_array['cfdi:Comprobante']['@attributes'])){
                $comprobante->comp_cbb_serie = $xml_array['cfdi:Comprobante']['@attributes']['serie'];
            }

            if(array_key_exists('folio', $xml_array['cfdi:Comprobante']['@attributes'])){
                $comprobante->comp_cbb_numfolio = $xml_array['cfdi:Comprobante']['@attributes']['folio'];
            }
        }

        if(array_key_exists('cfdi:Emisor', $xml_array['cfdi:Comprobante'])){
            if(array_key_exists('@attributes', $xml_array['cfdi:Comprobante']['cfdi:Emisor'])){

                $direccion = new Direccion();

                $comprobante->comp_rfc_emisor = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['rfc'];
                $proveedor = new Proveedor();
                $proveedor->proveed_nom = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['nombre'];
                $proveedor->proveed_rfc = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['rfc'];
                $proveedor->proveed_tipprov_id = 1;

                $tiene_dir_em = false;

                if(array_key_exists('cfdi:DomicilioFiscal', $xml_array['cfdi:Comprobante']['cfdi:Emisor'])){
                    if(array_key_exists('@attributes', $xml_array['cfdi:Comprobante']['cfdi:Emisor']['cfdi:DomicilioFiscal'])){

                        
                        if(array_key_exists('calle', $xml_array['cfdi:Comprobante']['cfdi:Emisor']['cfdi:DomicilioFiscal']['@attributes'])){
                            $direccion->direc_calle = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['cfdi:DomicilioFiscal']['@attributes']['calle'];
                        }

                        if(array_key_exists('noExterior', $xml_array['cfdi:Comprobante']['cfdi:Emisor']['cfdi:DomicilioFiscal']['@attributes'])){
                            $direccion->direc_num_ext = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['cfdi:DomicilioFiscal']['@attributes']['noExterior'];
                        }

                        if(array_key_exists('noInterior', $xml_array['cfdi:Comprobante']['cfdi:Emisor']['cfdi:DomicilioFiscal']['@attributes'])){
                            $direccion->direc_num_int = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['cfdi:DomicilioFiscal']['@attributes']['noInterior'];
                        }

                        if(array_key_exists('colonia', $xml_array['cfdi:Comprobante']['cfdi:Emisor']['cfdi:DomicilioFiscal']['@attributes'])){
                            $direccion->direc_colonia = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['cfdi:DomicilioFiscal']['@attributes']['colonia'];
                        }

                        if(array_key_exists('municipio', $xml_array['cfdi:Comprobante']['cfdi:Emisor']['cfdi:DomicilioFiscal']['@attributes'])){
                            $direccion->direc_municipio = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['cfdi:DomicilioFiscal']['@attributes']['municipio'];
                        }

                        if(array_key_exists('estado', $xml_array['cfdi:Comprobante']['cfdi:Emisor']['cfdi:DomicilioFiscal']['@attributes'])){
                            $direccion->direc_estado = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['cfdi:DomicilioFiscal']['@attributes']['estado'];
                        }

                        if(array_key_exists('pais', $xml_array['cfdi:Comprobante']['cfdi:Emisor']['cfdi:DomicilioFiscal']['@attributes'])){
                            $direccion->direc_pais = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['cfdi:DomicilioFiscal']['@attributes']['pais'];
                        }

                        if(array_key_exists('codigoPostal', $xml_array['cfdi:Comprobante']['cfdi:Emisor']['cfdi:DomicilioFiscal']['@attributes'])){
                            $direccion->direc_cp = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['cfdi:DomicilioFiscal']['@attributes']['codigoPostal'];
                        }

                        $direccion->save();
                        $tiene_dir_em = true;
                        $proveedor->proveed_direc_id = $direccion->id;
        
                    }
                }

                $search_proveedor = Proveedor::where('proveed_rfc',$xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['rfc'])->get();
                if(count($search_proveedor) == 0){
                    $proveedor->save();
                }

                $cliente = new Cliente();
                $cliente->cliente_nom = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['nombre'];
                $cliente->cliente_rfc = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['rfc'];
                $cliente->cliente_tipcliente_id = 1;

                if($tiene_dir_em){
                    $cliente->cliente_direc_id = $direccion->id;
                }

                $search_cliente = Cliente::where('cliente_rfc',$xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['rfc'])->get();
                if(count($search_cliente) == 0){
                    $cliente->save();
                }
            }
        }

        if(array_key_exists('cfdi:Receptor', $xml_array['cfdi:Comprobante'])){
            if(array_key_exists('@attributes', $xml_array['cfdi:Comprobante']['cfdi:Receptor'])){

                $direccion = new Direccion();

                $comprobante->comp_rfc_receptor = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['rfc'];
                $cliente = new Cliente();
                $cliente->cliente_nom = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['nombre'];
                $cliente->cliente_rfc = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['rfc'];
                $cliente->cliente_tipcliente_id = 1;

                $tiene_dir_rec = false;

                if(array_key_exists('cfdi:DomicilioFiscal', $xml_array['cfdi:Comprobante']['cfdi:Receptor'])){
                    if(array_key_exists('@attributes', $xml_array['cfdi:Comprobante']['cfdi:Receptor']['cfdi:DomicilioFiscal'])){

                        
                        if(array_key_exists('calle', $xml_array['cfdi:Comprobante']['cfdi:Receptor']['cfdi:DomicilioFiscal']['@attributes'])){
                            $direccion->direc_calle = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['cfdi:DomicilioFiscal']['@attributes']['calle'];
                        }

                        if(array_key_exists('noExterior', $xml_array['cfdi:Comprobante']['cfdi:Receptor']['cfdi:DomicilioFiscal']['@attributes'])){
                            $direccion->direc_num_ext = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['cfdi:DomicilioFiscal']['@attributes']['noExterior'];
                        }

                        if(array_key_exists('noInterior', $xml_array['cfdi:Comprobante']['cfdi:Receptor']['cfdi:DomicilioFiscal']['@attributes'])){
                            $direccion->direc_num_int = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['cfdi:DomicilioFiscal']['@attributes']['noInterior'];
                        }

                        if(array_key_exists('colonia', $xml_array['cfdi:Comprobante']['cfdi:Receptor']['cfdi:DomicilioFiscal']['@attributes'])){
                            $direccion->direc_colonia = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['cfdi:DomicilioFiscal']['@attributes']['colonia'];
                        }

                        if(array_key_exists('municipio', $xml_array['cfdi:Comprobante']['cfdi:Receptor']['cfdi:DomicilioFiscal']['@attributes'])){
                            $direccion->direc_municipio = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['cfdi:DomicilioFiscal']['@attributes']['municipio'];
                        }

                        if(array_key_exists('estado', $xml_array['cfdi:Comprobante']['cfdi:Receptor']['cfdi:DomicilioFiscal']['@attributes'])){
                            $direccion->direc_estado = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['cfdi:DomicilioFiscal']['@attributes']['estado'];
                        }

                        if(array_key_exists('pais', $xml_array['cfdi:Comprobante']['cfdi:Receptor']['cfdi:DomicilioFiscal']['@attributes'])){
                            $direccion->direc_pais = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['cfdi:DomicilioFiscal']['@attributes']['pais'];
                        }

                        if(array_key_exists('codigoPostal', $xml_array['cfdi:Comprobante']['cfdi:Receptor']['cfdi:DomicilioFiscal']['@attributes'])){
                            $direccion->direc_cp = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['cfdi:DomicilioFiscal']['@attributes']['codigoPostal'];
                        }

                        $direccion->save();
                        $tiene_dir_rec = true;
                        $cliente->cliente_direc_id = $direccion->id;
        
                    }
                }

                $search_cliente = Cliente::where('cliente_rfc',$xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['rfc'])->get();
                if(count($search_cliente) == 0){
                    $cliente->save();
                }

                $proveedor = new Proveedor();
                $proveedor->proveed_nom = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['nombre'];
                $proveedor->proveed_rfc = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['rfc'];
                $proveedor->proveed_tipprov_id = 1;

                if($tiene_dir_rec){
                    $proveedor->proveed_direc_id = $direccion->id;
                }

                $search_proveedor = Proveedor::where('proveed_rfc',$xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['rfc'])->get();
                if(count($search_proveedor) == 0){
                    $proveedor->save();
                }
            }
        }

        $comprobante->comp_complmto = 'CompNac';

        $comprobante->comp_tipocomp = $xml_array['cfdi:Comprobante']['@attributes']['tipoDeComprobante'];

        $comprobante->comp_espago = false;

        $comprobante->comp_imp_bov = false;

        $comprobante->comp_version = '3.2';

        $comprobante->save();
    

        $ef->process = true;
        $ef->process_fecha = date("Y-m-d H:i:s");
        $ef->filetype = $xml_array['cfdi:Comprobante']['@attributes']['tipoDeComprobante'];
        $ef->save();

        $this->ingresoEgreso32($xml_array,$comprobante,$xml_array['cfdi:Comprobante']['@attributes']['tipoDeComprobante']);

    }

    public function processFile33($xml_array,$alldata,$ef){
        $comp_espago = false;
        $arr_tpago = ['I'=>'ingreso','E'=>'egreso','P'=>'pago','N'=>'nomina','T'=>'Otro'];
        $emp_rfc = 'none';
        $emp_all = Empresa::all();
        if(count($emp_all) > 0){
            $emp_rfc = $emp_all[0]->emp_rfc;
        }

        if($xml_array['cfdi:Comprobante']['@attributes']){
                if(array_key_exists('TipoDeComprobante', $xml_array['cfdi:Comprobante']['@attributes'])){
                    $alldata['comptype'] = $arr_tpago[$xml_array['cfdi:Comprobante']['@attributes']['TipoDeComprobante']];
                    if($alldata['comptype']=='pago'){
                        $comp_espago = true;
                    }
                }
            }



         if (true) { //TODO validar el xml
                $comprobante = new Comprobante();
                if(array_key_exists('cfdi:Complemento', $xml_array['cfdi:Comprobante'])){
                    if(array_key_exists('tfd:TimbreFiscalDigital', $xml_array['cfdi:Comprobante']['cfdi:Complemento'])){
                        if(array_key_exists('@attributes', $xml_array['cfdi:Comprobante']['cfdi:Complemento']['tfd:TimbreFiscalDigital'])){
                            $comprobante->comp_uuid = $xml_array['cfdi:Comprobante']['cfdi:Complemento']['tfd:TimbreFiscalDigital']['@attributes']['UUID'];
                        }
                    }
                }
               

                if($xml_array['cfdi:Comprobante']['@attributes']){
                    if(array_key_exists('Fecha', $xml_array['cfdi:Comprobante']['@attributes'])){
                        $comprobante->comp_f_emision = date('Y-m-d H:i:s',strtotime($xml_array['cfdi:Comprobante']['@attributes']['Fecha']));
                    }

                    if(array_key_exists('Serie', $xml_array['cfdi:Comprobante']['@attributes'])){
                        $comprobante->comp_cbb_serie = $xml_array['cfdi:Comprobante']['@attributes']['Serie'];
                    }

                    if(array_key_exists('Folio', $xml_array['cfdi:Comprobante']['@attributes'])){
                        $comprobante->comp_cbb_numfolio = $xml_array['cfdi:Comprobante']['@attributes']['Folio'];
                    }
                }

                if(array_key_exists('cfdi:Emisor', $xml_array['cfdi:Comprobante'])){
                    if(array_key_exists('@attributes', $xml_array['cfdi:Comprobante']['cfdi:Emisor'])){
                        $comprobante->comp_rfc_emisor = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['Rfc'];
                        $proveedor = new Proveedor();
                        $proveedor->proveed_nom = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['Nombre'];
                        $proveedor->proveed_rfc = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['Rfc'];
                        $proveedor->proveed_tipprov_id = 1;
                        $search_proveedor = Proveedor::where('proveed_rfc',$xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['Rfc'])->get();
                        if(count($search_proveedor) == 0){
                            $proveedor->save();
                        }

                        $cliente = new Cliente();
                        $cliente->cliente_nom = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['Nombre'];
                        $cliente->cliente_rfc = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['Rfc'];
                        $cliente->cliente_tipcliente_id = 1;
                        $search_cliente = Cliente::where('cliente_rfc',$xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['Rfc'])->get();
                        if(count($search_cliente) == 0){
                            $cliente->save();
                        }
                    }
                }

                if(array_key_exists('cfdi:Receptor', $xml_array['cfdi:Comprobante'])){
                    if(array_key_exists('@attributes', $xml_array['cfdi:Comprobante']['cfdi:Receptor'])){
                        $comprobante->comp_rfc_receptor = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['Rfc'];
                        $cliente = new Cliente();
                        $cliente->cliente_nom = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['Nombre'];
                        $cliente->cliente_rfc = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['Rfc'];
                        $cliente->cliente_tipcliente_id = 1;
                        $search_cliente = Cliente::where('cliente_rfc',$xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['Rfc'])->get();
                        if(count($search_cliente) == 0){
                            $cliente->save();
                        }

                        $proveedor = new Proveedor();
                        $proveedor->proveed_nom = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['Nombre'];
                        $proveedor->proveed_rfc = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['Rfc'];
                        $proveedor->proveed_tipprov_id = 1;
                        $search_proveedor = Proveedor::where('proveed_rfc',$xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['Rfc'])->get();
                        if(count($search_proveedor) == 0){
                            $proveedor->save();
                        }
                    }
                }

                //TODO Validar tipo de complemento
                $comprobante->comp_complmto = 'CompNac';

                $comprobante->comp_tipocomp = $alldata['comptype'];

                $comprobante->comp_espago = $comp_espago;

                $comprobante->comp_imp_bov = false;

                $comprobante->comp_version = '3.3';

                $comprobante->save();
            

                $ef->process = true;
                $ef->process_fecha = date("Y-m-d H:i:s");
                $ef->filetype = $alldata['comptype'];
                $ef->save();

                //TODO Contabilizar
                if($alldata['comptype'] == 'ingreso' || $alldata['comptype'] == 'egreso'){
                    $this->ingresoEgreso($xml_array,$comprobante,$alldata['comptype']);
                }else if($alldata['comptype'] == 'pago'){
                    $rfc_emi = 'none';
                    $rfc_rec = 'none';
                    $rfc_param = 'none';
                    $ptype = 'ingreso';
                    if(array_key_exists('cfdi:Receptor', $xml_array['cfdi:Comprobante'])){
                        if(array_key_exists('@attributes', $xml_array['cfdi:Comprobante']['cfdi:Receptor'])){
                            $rfc_rec = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['Rfc'];
                        }
                    }

                    if(array_key_exists('cfdi:Receptor', $xml_array['cfdi:Comprobante'])){
                        if(array_key_exists('@attributes', $xml_array['cfdi:Comprobante']['cfdi:Emisor'])){
                            $rfc_emi = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['Rfc'];
                        }
                    }

                    if(strtoupper(trim($emp_rfc)) == strtoupper(trim($rfc_emi))){
                        $ptype = 'egreso';
                        $rfc_param = $rfc_rec;
                    }else{
                        $rfc_param = $rfc_emi;
                    }
                    $this->pago($xml_array,$comprobante,$ptype,$rfc_param);
                }


            }else{
                if (file_exists($full_path)){ 
                    unlink ($full_path); 
                }
                CompProces::destroy($ef->id);
            }
    }

    public function processFile(Request $request)
    {
        $alldata = $request->all();
        $logued_user = Auth::user();
        $XML2Array = new XML2Array();
        $exist_file = CompProces::where('user_id',$logued_user->id)->where('process',false)->get();
        $target_dir = base_path().DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR;

        foreach ($exist_file as $ef) {
        	$full_path = $target_dir.(string)$ef->user_id.'_'.$ef->filename;
        	$doc = new \DOMDocument();
			$doc->load(realpath($target_dir.(string)$ef->user_id.'_'.$ef->filename));

			
			
			
			$API_KEY = "6ba7d84839ee22fdfed979f78f0bbb78";
			$xml = $doc->saveXML();
        	$xml_array = $XML2Array->createArray($xml);
            Log::info($xml_array);
            //die();
        	$wsdl = 'https://app33.advans.mx/recepcion/wsvalidador.php?wsdl';
        	$cfdi = base64_encode($xml);
        	$context = stream_context_create(array(
              'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
              )
            ));

        	/*$soap = new SoapClient($wsdl,array('stream_context' => $context));
        	$params = ['credential' => $API_KEY,'cfdi' => $cfdi];
        	$data = $soap->__soapCall("validar", $params);

        	$result = json_decode(json_encode($data), True);

        	$xmlResult = $XML2Array->createArray(trim($result['Acuse']));

        	Log::info($result);*/

        	//if ($result['Code'] == "207") {

            if($xml_array['cfdi:Comprobante']['@attributes']){
                if(array_key_exists('version', $xml_array['cfdi:Comprobante']['@attributes'])){
                    if($xml_array['cfdi:Comprobante']['@attributes']['version'] == '3.3'){
                        $this->processFile33($xml_array,$alldata,$ef);
                    }else{
                        $this->processFile32($xml_array,$alldata,$ef);
                    }
                }

                if(array_key_exists('Version', $xml_array['cfdi:Comprobante']['@attributes'])){
                    if($xml_array['cfdi:Comprobante']['@attributes']['Version'] == '3.3'){
                        $this->processFile33($xml_array,$alldata,$ef);
                    }else{
                        $this->processFile32($xml_array,$alldata,$ef);
                    }
                }
            }
           
        }

        $response = array(
            'status' => 'success',
            'msg' => 'Ok'
        );
        return \Response::json($response);
    }


}
