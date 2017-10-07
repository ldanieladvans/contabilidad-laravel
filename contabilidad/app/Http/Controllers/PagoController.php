<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pago;
use App\Cuenta;
use App\Poliza;
use App\Comprobante;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PagoController extends Controller
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
        $pagos = Pago::all();
        $pagos_list = array();
        $pagos_contador = 0;
        foreach ($pagos as $ps) {
            $pagos_list[$pagos_contador] = ['ID'=>$ps->id,'pago_numoperc'=>$ps->pago_numoperc,'pago_monto'=>$ps->pago_monto,'pago_fecha'=>$ps->pago_fecha,'pago_formpago_nom'=>$ps->pago_formpago_nom,'pago_moneda_nom'=>$ps->pago_moneda_nom];
            $pagos_contador ++;
        }
        return view('appviews.listapagos',['pagos'=>json_encode($pagos_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('appviews.creapago',['pago_formpago_cod'=>[],'pago_moneda_cod'=>[],'pago_polz_id'=>[],'pago_comp_id'=>[]]);
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
