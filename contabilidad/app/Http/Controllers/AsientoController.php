<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;
use App\Poliza;
use App\Asiento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AsientoController extends Controller
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
        $asientos = Asiento::all();
        $asientos_list = array();
        $asientos_contador = 0;
        foreach ($asientos as $as) {
            $asientos_list[$asientos_contador] = ['ID'=>$as->id,'asiento_concepto'=>$as->asiento_concepto,'asiento_debe'=>$as->asiento_debe,'asiento_haber'=>$as->asiento_haber,'asiento_folio_ref'=>$as->asiento_folio_ref,'asiento_ctacont_id'=>$as->cuenta->ctacont_num,'asiento_polz_id'=>$as->poliza->polz_folio];
            $asientos_contador ++;
        }
        return view('appviews.listaasientos',['asientos'=>json_encode($asientos_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $polizas = Poliza::all();
        $cuentas = Cuenta::all();
        return view('appviews.creaasiento',['polizas'=>$polizas,'cuentas'=>$cuentas]);
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

        $asiento_activo = false;
        if(array_key_exists('asiento_activo', $alldata)){
            $asiento_activo = true;
        }
        $alldata['asiento_activo'] = $asiento_activo;

        $asiento = new Asiento($alldata);

        $asiento->save();

        $pgs_sync = array();
        if(array_key_exists('pagos', $alldata)){
            $pgs_sync = $alldata['pagos'];
        }

        $asiento->comprobanteRel()->sync($pgs_sync);

        $fmessage = 'Se ha creado el asiento: '.$asiento->asiento_folio_ref;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'store', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('asientos.index');
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
        $polizas = Poliza::all();
        $cuentas = Cuenta::all();
        $asiento = Asiento::findOrFail($id);
        return view('appviews.editaasiento',['asiento'=>$asiento,'polizas'=>$polizas,'cuentas'=>$cuentas]);
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

        $asiento = Asiento::findOrFail($id);

        $asiento_activo = false;
        if(array_key_exists('asiento_activo', $alldata)){
            $asiento_activo = true;
        }
        $alldata['asiento_activo'] = $asiento_activo;

        $asiento->asiento_concepto = $alldata['asiento_concepto'];
        $asiento->asiento_debe = $alldata['asiento_debe'];
        $asiento->asiento_haber = $alldata['asiento_haber'];
        $asiento->asiento_folio_ref = $alldata['asiento_folio_ref'];
        $asiento->asiento_ctacont_id = $alldata['asiento_ctacont_id'];
        $asiento->asiento_polz_id = $alldata['asiento_polz_id'];
        $asiento->asiento_activo = $alldata['asiento_activo'];

        $asiento->save();

        $pgs_sync = array();
        if(array_key_exists('pagos', $alldata)){
            $pgs_sync = $alldata['pagos'];
        }

        $asiento->comprobanteRel()->sync($pgs_sync);

        $fmessage = 'Se ha actualizado el asiento: '.$asiento->asiento_folio_ref;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'update', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('asientos.index');

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
