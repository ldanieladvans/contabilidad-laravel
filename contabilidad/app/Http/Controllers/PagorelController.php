<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pago;
use App\Asiento;
use App\Pagorel;
use App\FormaPago;
use App\CatSatMonedasModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PagorelController extends Controller
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
        $pagosrel = Pagorel::all();
        $pagosrel_list = array();
        $pagosrel_contador = 0;
        
        foreach ($pagosrel as $pg) {
            /*echo "<pre>";
            print_r($pg->asiento);
            die();
            echo "</pre>";*/
            $pagosrel_list[$pagosrel_contador] = ['ID'=>$pg->id,'pagorel_pago_id'=>$pg->pago ? $pg->pago->pago_numoperc : '','pagorel_pagado_uuid'=>$pg->pagorel_pagado_uuid,'pagorel_serie'=>$pg->pagorel_serie,'pagorel_moneda_nom'=>$pg->pagorel_moneda_nom,'pagorel_monto_pag'=>$pg->pagorel_monto_pag,'pagorel_asiento_id'=>$pg->asiento ? $pg->asiento->asiento_folio_ref:''];
            $pagosrel_contador ++;
        }
        return view('appviews.listapagosrel',['pagosrel'=>json_encode($pagosrel_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagos = Pago::all();
        $asientos = Asiento::all();
        $monedas = CatSatMonedasModel::all();
        return view('appviews.creapagorel',['pagorel_metpago_cod'=>[],'pagorel_moneda_cod'=>$monedas,'pagorel_pago_id'=>$pagos,'pagorel_asiento_id'=>$asientos]);
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
        $pagorel = new Pagorel($alldata);

        $pagorel->save();

        $fmessage = 'Se ha creado el pago relacionado: '.$pagorel->pagorel_pagado_uuid;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'store', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('pagosrel.index');
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
        $pagos = Pago::all();
        $asientos = Asiento::all();
        $pagorel = Pagorel::findOrFail($id);
        $monedas = CatSatMonedasModel::all();
        return view('appviews.editapagorel',['pagorel'=>$pagorel,'pagorel_metpago_cod'=>[],'pagorel_moneda_cod'=>$monedas,'pagorel_pago_id'=>$pagos,'pagorel_asiento_id'=>$asientos]);
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
        $pagorel = Pagorel::findOrFail($id);

        $pagorel->pagorel_pagado_uuid = $alldata['pagorel_pagado_uuid'];
        $pagorel->pagorel_serie = $alldata['pagorel_serie'];
        $pagorel->pagorel_folio = $alldata['pagorel_folio'];
        
        if(array_key_exists('pagorel_metpago_cod', $alldata)){
            $pagorel->pagorel_formpago_cod = $alldata['pagorel_metpago_cod'];
        }
        
        $pagorel->pagorel_metpago_nom = $alldata['pagorel_metpago_nom'];

        if(array_key_exists('pagorel_moneda_cod', $alldata)){
            $pagorel->pagorel_moneda_cod = $alldata['pagorel_moneda_cod'];
        }
        
        $pagorel->pagorel_moneda_nom = $alldata['pagorel_moneda_nom'];
        $pagorel->pagorel_tipo_cambio = $alldata['pagorel_tipo_cambio'];
        $pagorel->pagorel_numparcldad = $alldata['pagorel_numparcldad'];
        $pagorel->pagorel_sald_ant = $alldata['pagorel_sald_ant'];
        $pagorel->pagorel_monto_pag = $alldata['pagorel_monto_pag'];
        $pagorel->pagorel_sald_nuevo = $alldata['pagorel_sald_nuevo'];
        $pagorel->pagorel_pago_id = $alldata['pagorel_pago_id'];
        $pagorel->pagorel_asiento_id = $alldata['pagorel_asiento_id'];

        $pagorel->save();


        $fmessage = 'Se ha actualizado el pago relacionado: '.$pagorel->pagorel_pagado_uuid;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'update', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('pagosrel.index');
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
