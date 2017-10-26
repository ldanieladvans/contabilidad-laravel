<?php

namespace App\Http\Controllers;
use App\ReportConfig;
use App\TipoSubCuenta;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class ReportConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexBg()
    {
        $tscuentas = TipoSubCuenta::all();
        $rcall = ReportConfig::where('report_code','bg')->get();

        $tscuentas_activo_ids = array();
        $tscuentas_pasivo_ids = array();
        $tscuentas_capital_ids = array();
        $tscuentas_rest_ids = array();

        $dif_id = array();

        if(count($rcall) > 0){
        	foreach ($rcall as $rc) {
        		if($rc->report_group == 'activo'){
        			array_push($tscuentas_activo_ids, $rc->report_tiposubcta_id);
        		}else if($rc->report_group == 'pasivo'){
        			array_push($tscuentas_pasivo_ids, $rc->report_tiposubcta_id);
        		}else{
        			array_push($tscuentas_capital_ids, $rc->report_tiposubcta_id);
        		}
        	}
        	$ids_union = array_merge(array_merge($tscuentas_activo_ids, $tscuentas_pasivo_ids),$tscuentas_capital_ids);
        	Log::info($ids_union);
        	foreach ($tscuentas as $tsc_disp) {
        		if(!in_array($tsc_disp->id, $ids_union)){
        			array_push($tscuentas_rest_ids, $tsc_disp->id);
        		}
        	}
        }else{
        	foreach ($tscuentas as $tsc_disp) {
        		array_push($tscuentas_rest_ids, $tsc_disp->id);
	        }
        }

        return view('appviews.reportconfigbg',['tscuentas_rest_ids'=>TipoSubCuenta::whereIn('id',$tscuentas_rest_ids)->get(),'tscuentas_activo_ids'=>ReportConfig::where('report_code','bg')->whereIn('report_tiposubcta_id',$tscuentas_activo_ids)->orderBy('id')->get(),'tscuentas_pasivo_ids'=>ReportConfig::where('report_code','bg')->whereIn('report_tiposubcta_id',$tscuentas_pasivo_ids)->orderBy('id')->get(),'tscuentas_capital_ids'=>ReportConfig::where('report_code','bg')->whereIn('report_tiposubcta_id',$tscuentas_capital_ids)->orderBy('id')->get()]);
    }

    public function setReportBg(Request $request){
    	$alldata = $request->all();
    	Log::info($alldata);

    	ReportConfig::where('report_code','bg')->delete();

    	if(array_key_exists('listactivo', $alldata)){
    		foreach ($alldata['listactivo'] as $activo) {
	    		$new_rc_a = new ReportConfig();
	    		$new_rc_a->report_code = 'bg';
	    		$new_rc_a->report_tiposubcta_id = (int)$activo;
				$new_rc_a->report_group = 'activo';
				$new_rc_a->save();
	    	}
    	}

    	if(array_key_exists('listpasivo', $alldata)){
    		foreach ($alldata['listpasivo'] as $pasivo) {
	    		$new_rc_a = new ReportConfig();
	    		$new_rc_a->report_code = 'bg';
	    		$new_rc_a->report_tiposubcta_id = (int)$pasivo;
				$new_rc_a->report_group = 'pasivo';
				$new_rc_a->save();
	    	}
    	}

    	if(array_key_exists('listcapital', $alldata)){
    		foreach ($alldata['listcapital'] as $capital) {
	    		$new_rc_a = new ReportConfig();
	    		$new_rc_a->report_code = 'bg';
	    		$new_rc_a->report_tiposubcta_id = (int)$capital;
				$new_rc_a->report_group = 'capital';
				$new_rc_a->save();
	    	}
    	}
    	
    	$response = array(
            'status' => 'success',
            'msg' => 'Ok'
        );
        return \Response::json($response);
    }

    public function indexEr()
    {
        $tscuentas = TipoSubCuenta::all();
        $rcall = ReportConfig::where('report_code','er')->get();

        $tscuentas_ingreso_ids = array();
        $tscuentas_costoventa_ids = array();
        $tscuentas_gasto_ids = array();

        $tscuentas_otroingreso_ids = array();
        $tscuentas_otrogasto_ids = array();
        $tscuentas_impuesto_ids = array();

        $tscuentas_rest_ids = array();

        $dif_id = array();

        if(count($rcall) > 0){
        	foreach ($rcall as $rc) {
        		if($rc->report_group == 'ingreso'){
        			array_push($tscuentas_ingreso_ids, $rc->report_tiposubcta_id);
        		}else if($rc->report_group == 'costoventa'){
        			array_push($tscuentas_costoventa_ids, $rc->report_tiposubcta_id);
        		}else if($rc->report_group == 'gasto'){
        			array_push($tscuentas_gasto_ids, $rc->report_tiposubcta_id);
        		}else if($rc->report_group == 'otroingreso'){
        			array_push($tscuentas_otroingreso_ids, $rc->report_tiposubcta_id);
        		}else if($rc->report_group == 'otrogasto'){
        			array_push($tscuentas_otrogasto_ids, $rc->report_tiposubcta_id);
        		}else{
        			array_push($tscuentas_impuesto_ids, $rc->report_tiposubcta_id);
        		}
        	}
        	$ids_union = array_merge(array_merge(array_merge(array_merge(array_merge($tscuentas_ingreso_ids, $tscuentas_costoventa_ids),$tscuentas_gasto_ids),$tscuentas_otroingreso_ids),$tscuentas_otrogasto_ids),$tscuentas_impuesto_ids);
        	Log::info($ids_union);
        	foreach ($tscuentas as $tsc_disp) {
        		if(!in_array($tsc_disp->id, $ids_union)){
        			array_push($tscuentas_rest_ids, $tsc_disp->id);
        		}
        	}
        }else{
        	foreach ($tscuentas as $tsc_disp) {
        		array_push($tscuentas_rest_ids, $tsc_disp->id);
	        }
        }

        /*echo "<pre>";
        print_r($tscuentas_gasto_ids);
        die();
        echo "</pre>";*/

        return view('appviews.reportconfiger',['tscuentas_rest_ids'=>TipoSubCuenta::whereIn('id',$tscuentas_rest_ids)->get(),'tscuentas_ingreso_ids'=>ReportConfig::where('report_code','er')->whereIn('report_tiposubcta_id',$tscuentas_ingreso_ids)->orderBy('id')->get(),'tscuentas_costoventa_ids'=>ReportConfig::where('report_code','er')->whereIn('report_tiposubcta_id',$tscuentas_costoventa_ids)->orderBy('id')->get(),'tscuentas_gasto_ids'=>ReportConfig::where('report_code','er')->whereIn('report_tiposubcta_id',$tscuentas_gasto_ids)->orderBy('id')->get(),'tscuentas_otroingreso_ids'=>ReportConfig::where('report_code','er')->whereIn('report_tiposubcta_id',$tscuentas_otroingreso_ids)->orderBy('id')->get(),'tscuentas_otrogasto_ids'=>ReportConfig::where('report_code','er')->whereIn('report_tiposubcta_id',$tscuentas_otrogasto_ids)->orderBy('id')->get(),'tscuentas_impuesto_ids'=>ReportConfig::where('report_code','er')->whereIn('report_tiposubcta_id',$tscuentas_impuesto_ids)->orderBy('id')->get()]);
    }


    public function setReportEr(Request $request){
    	$alldata = $request->all();
    	Log::info($alldata);

    	ReportConfig::where('report_code','er')->delete();

    	if(array_key_exists('listingreso', $alldata)){
    		foreach ($alldata['listingreso'] as $ingreso) {
	    		$new_rc_a = new ReportConfig();
	    		$new_rc_a->report_code = 'er';
	    		$new_rc_a->report_tiposubcta_id = (int)$ingreso;
				$new_rc_a->report_group = 'ingreso';
				$new_rc_a->save();
	    	}
    	}

    	if(array_key_exists('listcostoventa', $alldata)){
    		foreach ($alldata['listcostoventa'] as $costoventa) {
	    		$new_rc_a = new ReportConfig();
	    		$new_rc_a->report_code = 'er';
	    		$new_rc_a->report_tiposubcta_id = (int)$costoventa;
				$new_rc_a->report_group = 'costoventa';
				$new_rc_a->save();
	    	}
    	}

    	if(array_key_exists('listgasto', $alldata)){
    		foreach ($alldata['listgasto'] as $gasto) {
	    		$new_rc_a = new ReportConfig();
	    		$new_rc_a->report_code = 'er';
	    		$new_rc_a->report_tiposubcta_id = (int)$gasto;
				$new_rc_a->report_group = 'gasto';
				$new_rc_a->save();
	    	}
    	}

    	if(array_key_exists('listotroingreso', $alldata)){
    		foreach ($alldata['listotroingreso'] as $otroingreso) {
	    		$new_rc_a = new ReportConfig();
	    		$new_rc_a->report_code = 'er';
	    		$new_rc_a->report_tiposubcta_id = (int)$otroingreso;
				$new_rc_a->report_group = 'otroingreso';
				$new_rc_a->save();
	    	}
    	}

    	if(array_key_exists('listotrogasto', $alldata)){
    		foreach ($alldata['listotrogasto'] as $otrogasto) {
	    		$new_rc_a = new ReportConfig();
	    		$new_rc_a->report_code = 'er';
	    		$new_rc_a->report_tiposubcta_id = (int)$otrogasto;
				$new_rc_a->report_group = 'otrogasto';
				$new_rc_a->save();
	    	}
    	}

    	if(array_key_exists('listimpuesto', $alldata)){
    		foreach ($alldata['listimpuesto'] as $impuesto) {
	    		$new_rc_a = new ReportConfig();
	    		$new_rc_a->report_code = 'er';
	    		$new_rc_a->report_tiposubcta_id = (int)$impuesto;
				$new_rc_a->report_group = 'impuesto';
				$new_rc_a->save();
	    	}
    	}
    	
    	$response = array(
            'status' => 'success',
            'msg' => 'Ok'
        );
        return \Response::json($response);
    }
}
