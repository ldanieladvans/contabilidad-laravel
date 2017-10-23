<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;
use App\Balanza;
use App\Periodo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BalanzaController extends Controller
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
        $balanzas = Balanza::all();
        $balanzas_list = array();
        $balanzas_contador = 0;
        foreach ($balanzas as $bl) {
            Log::info($bl);
            $balanzas_list[$balanzas_contador] = ['ID'=>$bl->id,'blnza_ctacont_id'=>$bl->cuenta->ctacont_num.'-'.$bl->cuenta->ctacont_desc,'blnza_period_id'=>$bl->periodo->period_fecha_fin,'blnza_saldo_inicial'=>$bl->blnza_saldo_inicial,'blnza_cargos'=>$bl->blnza_cargos,'blnza_abonos'=>$bl->blnza_abonos,'blnza_saldo_final'=>$bl->blnza_saldo_final];
            $balanzas_contador ++;
        }
        return view('appviews.listabalanzas',['balanzas'=>json_encode($balanzas_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
