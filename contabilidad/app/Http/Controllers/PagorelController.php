<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pago;
use App\Asiento;
use App\Pagorel;
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
            $pagosrel_list[$pagosrel_contador] = ['ID'=>$pg->id,'pagorel_pago_id'=>$pg->pago->pago_numoperc,'pagorel_pagado_uuid'=>$pg->pagorel_pagado_uuid,'pagorel_serie'=>$pg->pagorel_serie,'pagorel_moneda_nom'=>$pg->pagorel_moneda_nom,'pagorel_monto_pag'=>$pg->pagorel_monto_pag,'pagorel_asiento_id'=>$pg->asiento->asiento_folio_ref];
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
        return view('appviews.creapagorel',['pagorel_formpago_cod'=>[],'pagorel_moneda_cod'=>[],'pagorel_pago_id'=>[],'pagorel_asiento_id'=>[]]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
