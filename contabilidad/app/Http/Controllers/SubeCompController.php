<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompProces;
use App\Pago;
use App\Cuenta;
use App\Poliza;
use App\Comprobante;
use App\ComprobanteRel;
use App\Nomina;
use App\Provision;
use App\Cliente;
use App\Proveedor;
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

			$comp_espago = false;
			if($alldata['comptype']=='pago'){
				$comp_espago = true;
			}
			
			$API_KEY = "6ba7d84839ee22fdfed979f78f0bbb78";
			$xml = $doc->saveXML();
        	$xml_array = $XML2Array->createArray($xml);
        	//$xml_to_parse = simplexml_load_file(realpath($target_dir.(string)$ef->user_id.'_'.$ef->filename));
        	$wsdl = 'https://app33.advans.mx/recepcion/wsvalidador.php?wsdl';
        	$cfdi = base64_encode($xml);
        	$context = stream_context_create(array(
              'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
              )
            ));
            Log::info($xml_array);
        	$soap = new SoapClient($wsdl,array('stream_context' => $context));
        	$params = ['credential' => $API_KEY,'cfdi' => $cfdi];
        	$data = $soap->__soapCall("validar", $params);

        	$result = json_decode(json_encode($data), True);

        	$xmlResult = $XML2Array->createArray(trim($result['Acuse']));

        	Log::info($result);

        	if ($result['Code'] == "207") {
        		$comprobante = new Comprobante();
        		if(array_key_exists('cfdi:Complemento', $xml_array['cfdi:Comprobante'])){
        			if(array_key_exists('tfd:TimbreFiscalDigital', $xml_array['cfdi:Comprobante']['cfdi:Complemento'])){
        				if(array_key_exists('@attributes', $xml_array['cfdi:Comprobante']['cfdi:Complemento']['tfd:TimbreFiscalDigital'])){
        					$comprobante->comp_uuid = $xml_array['cfdi:Comprobante']['cfdi:Complemento']['tfd:TimbreFiscalDigital']['@attributes']['UUID'];
        				}
        			}
        		}

        		if(array_key_exists('cfdi:Emisor', $xml_array['cfdi:Comprobante'])){
        			if(array_key_exists('@attributes', $xml_array['cfdi:Comprobante']['cfdi:Emisor'])){
        				$comprobante->comp_rfc_emisor = $xml_array['cfdi:Comprobante']['cfdi:Emisor']['@attributes']['Rfc'];
        				if($alldata['comptype'] == 'ingreso'){
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
    			}

    			if(array_key_exists('cfdi:Receptor', $xml_array['cfdi:Comprobante'])){
    				if(array_key_exists('@attributes', $xml_array['cfdi:Comprobante']['cfdi:Receptor'])){
        				$comprobante->comp_rfc_receptor = $xml_array['cfdi:Comprobante']['cfdi:Receptor']['@attributes']['Rfc'];
        				if($alldata['comptype'] == 'egreso'){
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
    			}

    			if($xml_array['cfdi:Comprobante']['@attributes']){
    				if(array_key_exists('Fecha', $xml_array['cfdi:Comprobante']['@attributes'])){
        				$comprobante->comp_f_emision = $xml_array['cfdi:Comprobante']['@attributes']['Fecha'];
    				}

    				if(array_key_exists('Serie', $xml_array['cfdi:Comprobante']['@attributes'])){
        				$comprobante->comp_cbb_serie = $xml_array['cfdi:Comprobante']['@attributes']['Serie'];
    				}

    				if(array_key_exists('Folio', $xml_array['cfdi:Comprobante']['@attributes'])){
        				$comprobante->comp_cbb_numfolio = $xml_array['cfdi:Comprobante']['@attributes']['Folio'];
    				}
    			}

    			//TODO Validar tipo de complemento
    			$comprobante->comp_complmto = 'CompNac';

    			$comprobante->comp_tipocomp = $alldata['comptype'];

    			$comprobante->comp_espago = $comp_espago;

    			$comprobante->comp_imp_bov = false;

    			$comprobante->save();

    			if($alldata['comptype'] == 'ingreso' || $alldata['comptype'] == 'egreso'){
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

        		$ef->process = true;
        		$ef->process_fecha = date("Y-m-d H:i:s");
        		$ef->filetype = $alldata['comptype'];
        		$ef->save();

        		//TODO Contabilizar
        	}else{
        		if (file_exists($full_path)){ 
	                unlink ($full_path); 
	            }
	            CompProces::destroy($ef->id);
        	}
        }

        $response = array(
            'status' => 'success',
            'msg' => 'Ok'
        );
        return \Response::json($response);
    }


}
