<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periodo;
use App\Ejercicio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PeriodoController extends Controller
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
        $periodos = Periodo::all();
        $periodos_list = array();
        $periodos_contador = 0;
        foreach ($periodos as $pr) {
            $periodos_list[$periodos_contador] = ['ID'=>$pr->id,'period_ejerc_id'=>$pr->ejercicio->ejerc_anio,'period_fecha_ini'=>$pr->period_fecha_ini,'period_fecha_fin'=>$pr->period_fecha_fin,'period_cerrado'=>$pr->period_cerrado ? 'Si':'No','period_de_cierre'=>$pr->period_de_cierre ? 'Si':'No'];
            $periodos_contador ++;
        }
        return view('appviews.listaperiodos',['periodos'=>json_encode($periodos_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $period_ejerc_id = Ejercicio::all();
        return view('appviews.creaperiodo',['period_ejerc_id'=>$period_ejerc_id]);
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

        if(array_key_exists('period_cerrado',$alldata)){
             $alldata['period_cerrado'] = true;
        }else{
            $alldata['period_cerrado'] = false;
        }
        if(array_key_exists('period_de_cierre',$alldata)){
            $alldata['period_de_cierre'] = true;
        }else{
            $alldata['period_de_cierre'] = false;
        }

        $periodo = new Periodo($alldata);

        $periodo->save();

        $fmessage = 'Se ha creado el periodo: '.$periodo->period_fecha_fin;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'store', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('periodos.index');
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
        $period_ejerc_id = Ejercicio::all();
        $periodo = Periodo::findOrFail($id);
        return view('appviews.editaperiodo',['periodo'=>$periodo,'period_ejerc_id'=>$period_ejerc_id]);
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
        $periodo = Periodo::findOrFail($id);

        $period_cerrado = false;
        if(array_key_exists('period_cerrado',$alldata)){
             $period_cerrado = true;
        }
        $period_de_cierre = false;
        if(array_key_exists('period_de_cierre',$alldata)){
            $period_de_cierre = true;
        }

        $periodo->period_ejerc_id = $alldata['period_ejerc_id'];
        $periodo->period_fecha_ini = $alldata['period_fecha_ini'];
        $periodo->period_fecha_fin = $alldata['period_fecha_fin'];
        $periodo->period_cerrado = $period_cerrado;
        $periodo->period_de_cierre = $period_de_cierre;

        $periodo->save();

        $fmessage = 'Se ha actualizado el periodo: '.$periodo->period_fecha_fin;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'update', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('periodos.index');

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
