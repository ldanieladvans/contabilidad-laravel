<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;
use App\ConfigConcepto;
use App\ConfigNomina;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContConfigController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confignom = ConfigNomina::all();
        $confignom_list = array();
        $confignom_contador = 0;
        foreach ($confignom as $cc) {
            $confignom_list[$confignom_contador] = ['ID'=>$cc->id,'confnom_contabiliz_nom'=>$cc->confnom_contabiliz_nom == 'concept' ? 'Por concepto':'Por monto','confnom_prov_nom_cta_id'=>$cc->cuentaProvision->ctacont_num,'confnom_percep_cta_id'=>$cc->cuentaPercepcion->ctacont_num,'confnom_retenc_cta_id'=>$cc->cuentaRetencion->ctacont_num,'confnom_otrospag_cta_id'=>$cc->cuentaOtroPago->ctacont_num];
            $confignom_contador ++;
        }
        return view('appviews.listaconfignom',['confignom'=>json_encode($confignom_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tconcs = array();
        $cuentas_list = array();
        $cuentas_contador = 0;
        
        $tconcs[0]=['ID'=>'percep','Name'=>'Percepciones'];
        $tconcs[1]=['ID'=>'deduc','Name'=>'Deducciones'];
        $tconcs[2]=['ID'=>'otro','Name'=>'Otros'];

        $cuentas_all = Cuenta::all();

        foreach ($cuentas_all as $ca) {
            $cuentas_list[$cuentas_contador] = ['ID'=>$ca->id,'Name'=>$ca->ctacont_num];
            $cuentas_contador ++;
        }


        $configconc = ConfigConcepto::all();
        $configconc_list = array();
        $configconc_contador = 0;
        foreach ($configconc as $cc) {
            $configconc_list[$configconc_contador] = ['ID'=>$cc->id,'confconc_codsat'=>$cc->confconc_codsat,'confconc_tipoconcpto'=>$cc->confconc_tipoconcpto,'confconc_cta_id'=>$cc->confconc_cta_id];
            $configconc_contador ++;
        }


        return view('appviews.creaconfignom',['tconcs'=>json_encode($tconcs),'cuentas'=>json_encode($cuentas_list),'confconcs'=>json_encode($configconc_list),'confnom_prov_nom_cta_id'=>$cuentas_all,'confnom_percep_cta_id'=>$cuentas_all,'confnom_retenc_cta_id'=>$cuentas_all,'confnom_otrospag_cta_id'=>$cuentas_all]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alldata = $request->all();
        $logued_user = Auth::user();

        $confnom = new ConfigNomina($alldata);
        $confnom->save();

        $fmessage = 'Se ha creado la configuración de nómina: '.$confnom->id;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'store', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('contconfig.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $confnom = ConfigNomina::findOrFail($id);

        $tconcs = array();
        $cuentas_list = array();
        $cuentas_contador = 0;
        
        $tconcs[0]=['ID'=>'percep','Name'=>'Percepciones'];
        $tconcs[1]=['ID'=>'deduc','Name'=>'Deducciones'];
        $tconcs[2]=['ID'=>'otro','Name'=>'Otros'];

        $cuentas_all = Cuenta::all();

        foreach ($cuentas_all as $ca) {
            $cuentas_list[$cuentas_contador] = ['ID'=>$ca->id,'Name'=>$ca->ctacont_num];
            $cuentas_contador ++;
        }


        $configconc = ConfigConcepto::all();
        $configconc_list = array();
        $configconc_contador = 0;
        foreach ($configconc as $cc) {
            $configconc_list[$configconc_contador] = ['ID'=>$cc->id,'confconc_codsat'=>$cc->confconc_codsat,'confconc_tipoconcpto'=>$cc->confconc_tipoconcpto,'confconc_cta_id'=>$cc->confconc_cta_id];
            $configconc_contador ++;
        }


        return view('appviews.editaconfignom',['tconcs'=>json_encode($tconcs),'cuentas'=>json_encode($cuentas_list),'confconcs'=>json_encode($configconc_list),'confnom_prov_nom_cta_id'=>$cuentas_all,'confnom_percep_cta_id'=>$cuentas_all,'confnom_retenc_cta_id'=>$cuentas_all,'confnom_otrospag_cta_id'=>$cuentas_all,'confnom'=>$confnom]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alldata = $request->all();
        $logued_user = Auth::user();

        $confnom = ConfigNomina::findOrFail($id);

        if(array_key_exists('confnom_contabiliz_nom', $alldata)){
            $confnom->confnom_contabiliz_nom = $alldata['confnom_contabiliz_nom'];
        }
        if(array_key_exists('confnom_prov_nom_cta_id', $alldata)){
            $confnom->confnom_prov_nom_cta_id = $alldata['confnom_prov_nom_cta_id'];
        }
        if(array_key_exists('confnom_percep_cta_id', $alldata)){
            $confnom->confnom_percep_cta_id = $alldata['confnom_percep_cta_id'];
        }
        if(array_key_exists('confnom_retenc_cta_id', $alldata)){
            $confnom->confnom_retenc_cta_id = $alldata['confnom_retenc_cta_id'];
        }
        if(array_key_exists('confnom_otrospag_cta_id', $alldata)){
            $confnom->confnom_otrospag_cta_id = $alldata['confnom_otrospag_cta_id'];
        }

        $confnom->save();

        $fmessage = 'Se ha actualizado la configuración de nómina: '.$confnom->id;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'update', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('contconfig.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
