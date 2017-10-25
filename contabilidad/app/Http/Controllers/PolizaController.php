<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pago;
use App\Cuenta;
use App\Poliza;
use App\Comprobante;
use App\Periodo;
use App\Asiento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PolizaController extends Controller
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
        $polizas = Poliza::all();
        $polizas_list = array();
        $polizas_contador = 0;
        foreach ($polizas as $pz) {
            $polizas_list[$polizas_contador] = ['ID'=>$pz->id,'polz_concepto'=>$pz->polz_concepto,'polz_tipopolz'=>$pz->polz_tipopolz,'polz_fecha'=>$pz->polz_fecha,'polz_folio'=>$pz->polz_folio,'polz_importe'=>$pz->polz_importe,'polz_defecto'=>$pz->polz_defecto ? 'Si':'No','polz_sin_reclsif_imp'=>$pz->polz_sin_reclsif_imp ? 'Si':'No','polz_aprobado'=>$pz->polz_aprobado ? 'Si':'No'];
            $polizas_contador ++;
        }
        return view('appviews.listapolizas',['polizas'=>json_encode($polizas_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO Buscar tipo de poliza
        $periodos = Periodo::all();
        return view('appviews.creapoliza',['polz_period_id'=>$periodos]);
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
        
        $polz_aprobado = false;
        if(array_key_exists('polz_aprobado',$alldata)){
             $polz_aprobado = true;
        }
        $polz_importada = false;
        if(array_key_exists('polz_importada',$alldata)){
            $polz_importada = true;
        }
        $polz_activo = false;
        if(array_key_exists('polz_activo',$alldata)){
            $polz_activo = true;
        }
        $polz_cierre = false;
        if(array_key_exists('polz_cierre',$alldata)){
            $polz_cierre = true;
        }
        $polz_modificada = false;
        if(array_key_exists('polz_modificada',$alldata)){
            $polz_modificada = true;
        }

        $alldata['polz_aprobado'] = $polz_aprobado;
        $alldata['polz_importada'] = $polz_importada;
        $alldata['polz_activo'] = $polz_activo;
        $alldata['polz_cierre'] = $polz_cierre;
        $alldata['polz_modificada'] = $polz_modificada;
        $alldata['polz_manual'] = true;
        $poliza = new Poliza($alldata);
        $poliza->save();

        $fmessage = 'Se ha creado la póliza: '.$poliza->polz_folio;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'store', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        //return redirect()->route('polizas.index');
        return redirect()->route('polizas.edit',$poliza->id);
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
        //TODO Buscar tipo de poliza
        $poliza = Poliza::findOrFail($id);
        $periodos = Periodo::all();

        $asientos = Asiento::where('asiento_polz_id',$id)->get();
        $asientos_list = array();
        $asientos_contador = 0;

        foreach ($asientos as $as) {
            $asientos_list[$asientos_contador] = ['ID'=>$as->id,'asiento_concepto'=>$as->asiento_concepto,'asiento_debe'=>$as->asiento_debe,'asiento_haber'=>$as->asiento_haber,'asiento_folio_ref'=>$as->asiento_folio_ref,'asiento_ctacont_id'=>$as->asiento_ctacont_id];
            $asientos_contador ++;
        }

        $cuentas = array();
        $cuentas_list = array();
        $cuentas_contador = 0;

        $cuentas_all = Cuenta::all();

        foreach ($cuentas_all as $ca) {
            $cuentas_list[$cuentas_contador] = ['ID'=>$ca->id,'Name'=>$ca->ctacont_num.' - '.$ca->ctacont_desc];
            $cuentas_contador ++;
        }

        $comprobantes = Comprobante::all();

        return view('appviews.editapoliza',['poliza'=>$poliza,'polz_period_id'=>$periodos,'asientos'=>json_encode($asientos_list),'comprobantes'=>$comprobantes,'cuentas'=>json_encode($cuentas_list)]);
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
        $poliza = Poliza::findOrFail($id);
        
        $polz_aprobado = false;
        if(array_key_exists('polz_aprobado',$alldata)){
             $polz_aprobado = true;
        }
        $polz_importada = false;
        if(array_key_exists('polz_importada',$alldata)){
            $polz_importada = true;
        }
        $polz_activo = false;
        if(array_key_exists('polz_activo',$alldata)){
            $polz_activo = true;
        }
        $polz_cierre = false;
        if(array_key_exists('polz_cierre',$alldata)){
            $polz_cierre = true;
        }
        $polz_modificada = false;
        if(array_key_exists('polz_modificada',$alldata)){
            $polz_modificada = true;
        }

        if(array_key_exists('polz_concepto',$alldata)){
            $poliza->polz_concepto = $alldata['polz_concepto'];
        }
        if(array_key_exists('polz_folio',$alldata)){
            $poliza->polz_folio = $alldata['polz_folio'];
        }
        if(array_key_exists('polz_fecha',$alldata)){
            $poliza->polz_fecha = $alldata['polz_fecha'];
        }
        if(array_key_exists('polz_importe',$alldata)){
            $poliza->polz_importe = $alldata['polz_importe'];
        }
        if(array_key_exists('polz_tipopolz',$alldata)){
            $poliza->polz_tipopolz = $alldata['polz_tipopolz'];
        }
        if(array_key_exists('polz_period_id',$alldata)){
            $poliza->polz_period_id = $alldata['polz_period_id'];
        }

        $poliza->polz_aprobado = $polz_aprobado;
        $poliza->polz_importada = $polz_importada;
        $poliza->polz_activo = $polz_activo;
        $poliza->polz_cierre = $polz_cierre;
        $poliza->polz_modificada = $polz_modificada;

        $poliza->save();
        $comps_sync = array();
        if(array_key_exists('comps', $alldata)){
            $comps_sync = $alldata['comps'];
        }
        if($poliza->polz_manual){
            $poliza->comprobantes()->sync($comps_sync);
        }
        

        $fmessage = 'Se ha actualizado la póliza: '.$poliza->polz_folio;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'update', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('polizas.index');

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
