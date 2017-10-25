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
use App\TipoCliente;
use App\Proveedor;
use App\TipoProveedor;
use App\TipoSubCuenta;
use App\GeneralConfigModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Lib\XML2Array;
use SoapClient;

class ConfigContController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($step)
    {
        /*echo "<pre>";
        print_r($step);
        die();
        echo "<pre>";*/
        $confimodel = false;
        $allconfig = GeneralConfigModel::all();
        if(count($allconfig) > 0){
        	$confimodel = GeneralConfigModel::findOrFail($allconfig[0]->id);
        }else{
        	$newconfigmodel = new GeneralConfigModel();
        	$newconfigmodel->save();
        	$confimodel = GeneralConfigModel::findOrFail($newconfigmodel->id);
        }

        $cuentas = Cuenta::all();

        return view('appviews.configcont',['wstep'=>$step,'confimodel'=>$confimodel,'cuentas'=>$cuentas]);
    }

    public function downloadFile(Request $request)
    {
    	$pathtoFile = base_path().DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR.'PlanContable.xlsx';
      	return response()->download($pathtoFile);
    }

    public function configPc(Request $request)
    {
    	$alldata = $request->all();
        $logued_user = Auth::user();

        

    	$target_dir = base_path().DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR;
    	$tipo_cuenta_arr = ['Activo'=>'activo','Pasivo'=>'pasivo','Capital'=>'capital','Ingresos'=>'ingresos','Gastos'=>'gastos','Orden'=>'orden','Resultados'=>'resultados'];

    	$naturaleza_arr = ['Acreedora'=>'credit','Deudora'=>'debit'];
		$tipo_subcuenta_arr = array();
    	$tscuentas = TipoSubCuenta::all();
    	foreach ($tscuentas as $ts) {
        	$tipo_subcuenta_arr[str_replace(' ', '', $ts->tiposubcta_nom)] = $ts->id;
        }
    	
    	
      	if(array_key_exists('file',$alldata)){
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.\Session::get('selected_database','generic').(string)$logued_user->id.'_'.$_FILES['file']['name']);

            Cuenta::whereNotNull('id')->delete();

			$excel = \Excel::load($target_dir.\Session::get('selected_database','generic').(string)$logued_user->id.'_'.$_FILES['file']['name'])->all()->toArray();


			foreach ($excel as $xls) {
				$cuenta = new Cuenta();

	        	$cuenta->ctacont_catsat_cod = $xls['codigo_sat'];
	        	$cuenta->ctacont_catsat_nom = $xls['codigo_sat'];//TODO buscar en catalogo el nombre de lacuenta dado el codigo
	        	$cuenta->ctacont_tipocta_cod = strtolower($xls['tipo_de_cuenta']);
	        	$cuenta->ctacont_tipocta_nom = $xls['tipo_de_cuenta'];
	        	$cuenta->ctacont_num = $xls['no._de_cuenta'];
	        	$cuenta->ctacont_desc = $xls['nombre'];
	        	$cuenta->ctacont_tiposubcta_id = $tipo_subcuenta_arr[str_replace(' ', '', $xls['tipo_de_sub_cuenta'])];
	        	$cuenta->ctacont_natur = $naturaleza_arr[$xls['naturaleza']];

	        	if($xls['cuenta_efectivo'] == 'Si'){
	        		$cuenta->ctacont_efectivo = true;
	        	}
	        	if($xls['cuenta_declarada'] == 'Si'){
	        		$cuenta->ctacont_decalarada = true;
	        	}
	        	if($xls['cuenta_interna'] == 'Si'){
	        		$cuenta->ctacont_pte_complnt = true;
	        	}

	        	$cuenta->save();
                $cuenta->initJournal();
			}

        }

        //return view('appviews.configcont',['wstep'=>2]);
        return redirect()->route('configcontindex',2);
    }


    public function configPcClients(Request $request)
    {
    	$alldata = $request->all();
        $logued_user = Auth::user();       

    	$confimodel = false;
        $allconfig = GeneralConfigModel::all();
        if(count($allconfig) > 0){
        	$confimodel = GeneralConfigModel::findOrFail($allconfig[0]->id);
        }else{
        	$newconfigmodel = new GeneralConfigModel();
        	$newconfigmodel->save();
        	$confimodel = GeneralConfigModel::findOrFail($newconfigmodel->id);
        }

        /*$tipcl = false;
        $alltipcl = TipoCliente::all();
        if(count($alltipcl )>0){
        	$tipcl = TipoCliente::findOrFail($alltipcl[0]->id);
        }else{
        	$newtipcl = new TipoCliente();
        	$newtipcl->save();
        	$tipcl = GeneralConfigModel::findOrFail($newtipcl->id);
        }*/

        $confimodel->cliente_cta_ingreso_id = $alldata['cliente_cta_ingreso_id'];
        $confimodel->cliente_cta_desc_id = $alldata['cliente_cta_desc_id'];
		$confimodel->cliente_cta_iva_traslad_x_cob_id = $alldata['cliente_cta_iva_traslad_x_cob_id'];
		$confimodel->cliente_cta_iva_traslad_cob_id = $alldata['cliente_cta_iva_traslad_cob_id'];
		$confimodel->cliente_cta_iva_reten_x_cob_id = $alldata['cliente_cta_iva_reten_x_cob_id'];
		$confimodel->cliente_cta_iva_reten_cob_id = $alldata['cliente_cta_iva_reten_cob_id'];
		$confimodel->cliente_cta_isr_reten_id = $alldata['cliente_cta_isr_reten_id'];
		$confimodel->cliente_cta_por_cobrar_id = $alldata['cliente_cta_por_cobrar_id'];
		$confimodel->cliente_cta_anticp_client_id = $alldata['cliente_cta_anticp_client_id'];
		$confimodel->cliente_cta_isr_reten_cob_id = $alldata['cliente_cta_isr_reten_cob_id'];
		$confimodel->cliente_cta_ieps_por_cobrar_id = $alldata['cliente_cta_ieps_por_cobrar_id'];
		$confimodel->cliente_cta_ieps_cobrado_id = $alldata['cliente_cta_ieps_cobrado_id'];
		$confimodel->cliente_cta_ieps_reten_por_cobrar_id = $alldata['cliente_cta_ieps_reten_por_cobrar_id'];
		$confimodel->cliente_cta_ieps_reten_cobrado_id = $alldata['cliente_cta_ieps_reten_cobrado_id'];
        $confimodel->cliente_concepto = $alldata['cliente_concepto'];

		$confimodel->save();

        //return view('appviews.configcont',['wstep'=>2]);
        return redirect()->route('configcontindex',3);
    }


    public function configPcProvs(Request $request)
    {
    	$alldata = $request->all();
        $logued_user = Auth::user();       

    	$confimodel = false;
        $allconfig = GeneralConfigModel::all();
        if(count($allconfig) > 0){
        	$confimodel = GeneralConfigModel::findOrFail($allconfig[0]->id);
        }else{
        	$newconfigmodel = new GeneralConfigModel();
        	$newconfigmodel->save();
        	$confimodel = GeneralConfigModel::findOrFail($newconfigmodel->id);
        }

        /*$tipcl = false;
        $alltipcl = TipoCliente::all();
        if(count($alltipcl )>0){
        	$tipcl = TipoCliente::findOrFail($alltipcl[0]->id);
        }else{
        	$newtipcl = new TipoCliente();
        	$newtipcl->save();
        	$tipcl = GeneralConfigModel::findOrFail($newtipcl->id);
        }*/

        $confimodel->proveed_cta_egreso_id = $alldata['proveed_cta_egreso_id'];
        $confimodel->proveed_cta_desc_id = $alldata['proveed_cta_desc_id'];
		$confimodel->proveed_cta_iva_acredit_x_cob_id = $alldata['proveed_cta_iva_acredit_x_cob_id'];
		$confimodel->proveed_cta_iva_acredit_cob_id = $alldata['proveed_cta_iva_acredit_cob_id'];
		$confimodel->proveed_cta_iva_reten_x_cob_id = $alldata['proveed_cta_iva_reten_x_cob_id'];
		$confimodel->proveed_cta_iva_reten_cob_id = $alldata['proveed_cta_iva_reten_cob_id'];
		$confimodel->proveed_cta_isr_reten_id = $alldata['proveed_cta_isr_reten_id'];
		$confimodel->proveed_cta_por_pagar_id = $alldata['proveed_cta_por_pagar_id'];
		$confimodel->proveed_cta_anticp_prov_id = $alldata['proveed_cta_anticp_prov_id'];
		$confimodel->proveed_cta_isr_reten_cob_id = $alldata['proveed_cta_isr_reten_cob_id'];
		$confimodel->proveed_cta_ieps_por_cobrar_id = $alldata['proveed_cta_ieps_por_cobrar_id'];
		$confimodel->proveed_cta_ieps_cobrado_id = $alldata['proveed_cta_ieps_cobrado_id'];
		$confimodel->proveed_cta_ieps_reten_por_cobrar_id = $alldata['proveed_cta_ieps_reten_por_cobrar_id'];
		$confimodel->proveed_cta_ieps_reten_cobrado_id = $alldata['proveed_cta_ieps_reten_cobrado_id'];
        $confimodel->proveedor_concepto = $alldata['proveedor_concepto'];

		$confimodel->save();

        //return view('appviews.configcont',['wstep'=>2]);
        return redirect()->route('configcontindex',4);
    }

    public function configPcFinish(Request $request)
    {
    	$alldata = $request->all();
        $logued_user = Auth::user();       

    	$confimodel = false;
        $allconfig = GeneralConfigModel::all();
        if(count($allconfig) > 0){
        	$confimodel = GeneralConfigModel::findOrFail($allconfig[0]->id);
        }else{
        	$newconfigmodel = new GeneralConfigModel();
        	$newconfigmodel->save();
        	$confimodel = GeneralConfigModel::findOrFail($newconfigmodel->id);
        }

        $tipcl = false;
        $alltipcl = TipoCliente::all();
        if(count($alltipcl )>0){
        	$tipcl = TipoCliente::findOrFail($alltipcl[0]->id);
        }else{
        	$newtipcl = new TipoCliente();
        	$newtipcl->save();
        	$tipcl = TipoCliente::findOrFail($newtipcl->id);
        }

        $tipcl->tipcliente_desc = 'Tipo de cliente configuración';
        $tipcl->tipcliente_cta_ingreso_id = $confimodel->cliente_cta_ingreso_id;
        $tipcl->tipcliente_cta_desc_id = $confimodel->cliente_cta_desc_id;
        $tipcl->tipcliente_cta_iva_traslad_x_cob_id = $confimodel->cliente_cta_iva_traslad_x_cob_id;
        $tipcl->tipcliente_cta_iva_traslad_cob_id = $confimodel->cliente_cta_iva_traslad_cob_id;
        $tipcl->tipcliente_cta_iva_reten_x_cob_id = $confimodel->cliente_cta_iva_reten_x_cob_id;
        $tipcl->tipcliente_cta_iva_reten_cob_id = $confimodel->cliente_cta_iva_reten_cob_id;
        $tipcl->tipcliente_cta_isr_reten_id = $confimodel->cliente_cta_isr_reten_id;
        $tipcl->tipcliente_cta_por_cobrar_id = $confimodel->cliente_cta_por_cobrar_id;
        $tipcl->tipcliente_cta_anticp_client_id = $confimodel->cliente_cta_anticp_client_id;
        $tipcl->tipcliente_cta_isr_reten_cob_id = $confimodel->cliente_cta_isr_reten_cob_id;
        $tipcl->tipcliente_cta_ieps_por_cobrar_id = $confimodel->cliente_cta_ieps_por_cobrar_id;
        $tipcl->tipcliente_cta_ieps_cobrado_id = $confimodel->cliente_cta_ieps_cobrado_id;
        $tipcl->tipcliente_cta_ieps_reten_por_cobrar_id = $confimodel->cliente_cta_ieps_reten_por_cobrar_id;
        $tipcl->tipcliente_cta_ieps_reten_cobrado_id = $confimodel->cliente_cta_ieps_reten_cobrado_id;

        $tipcl->tipcliente_concpto_polz = $confimodel->cliente_concepto ? $confimodel->cliente_concepto : 'Concepto';

        $tipcl->save();

        $tiprov = false;
        $alltiprov = TipoProveedor::all();
        if(count($alltiprov )>0){
        	$tiprov = TipoProveedor::findOrFail($alltiprov[0]->id);
        }else{
        	$newtiprov = new TipoProveedor();
        	$newtiprov->save();
        	$tiprov = TipoProveedor::findOrFail($newtiprov->id);
        }

        $tiprov->tipprov_desc = 'Tipo de proveedor configuración';
        $tiprov->tipprov_cta_egreso_id = $confimodel->proveed_cta_egreso_id;
        $tiprov->tipprov_cta_desc_id = $confimodel->proveed_cta_desc_id;
        $tiprov->tipprov_cta_iva_acredit_x_cob_id = $confimodel->proveed_cta_iva_acredit_x_cob_id;
        $tiprov->tipprov_cta_iva_acredit_cob_id = $confimodel->proveed_cta_iva_acredit_cob_id;
        $tiprov->tipprov_cta_iva_reten_x_cob_id = $confimodel->proveed_cta_iva_reten_x_cob_id;
        $tiprov->tipprov_cta_iva_reten_cob_id = $confimodel->proveed_cta_iva_reten_cob_id;
        $tiprov->tipprov_cta_isr_reten_id = $confimodel->proveed_cta_isr_reten_id;
        $tiprov->tipprov_cta_por_pagar_id = $confimodel->proveed_cta_por_pagar_id;
        $tiprov->tipprov_cta_anticp_prov_id = $confimodel->proveed_cta_anticp_prov_id;
        $tiprov->tipprov_cta_isr_reten_cob_id = $confimodel->proveed_cta_isr_reten_cob_id;
        $tiprov->tipprov_cta_ieps_por_cobrar_id = $confimodel->proveed_cta_ieps_por_cobrar_id;
        $tiprov->tipprov_cta_ieps_cobrado_id = $confimodel->proveed_cta_ieps_cobrado_id;
        $tiprov->tipprov_cta_ieps_reten_por_cobrar_id = $confimodel->proveed_cta_ieps_reten_por_cobrar_id;
        $tiprov->tipprov_cta_ieps_reten_cobrado_id = $confimodel->proveed_cta_ieps_reten_cobrado_id;

        $tiprov->tipprov_concpto_polz = $confimodel->proveedor_concepto ? $confimodel->proveedor_concepto : 'Concepto';

		$tiprov->save();

		$confimodel->is_config = true;

		$fmessage = 'Su contabilidad ha sido configurada satisfactoriamente';
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'config', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        //return view('appviews.configcont',['wstep'=>2]);
        return redirect()->route('subecompindex');
    }
}
