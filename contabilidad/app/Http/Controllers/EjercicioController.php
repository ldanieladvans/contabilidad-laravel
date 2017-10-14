<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periodo;
use App\Ejercicio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EjercicioController extends Controller
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
        $ejercicios = Ejercicio::all();
        $ejercicios_list = array();
        $ejercicios_contador = 0;
        foreach ($ejercicios as $ej) {
            $ejercicios_list[$ejercicios_contador] = ['ID'=>$ej->id,'ejerc_anio'=>$ej->ejerc_anio,'ejerc_cerrado'=>$ej->ejerc_cerrado ? 'Si':'No'];
            $ejercicios_contador ++;
        }
        return view('appviews.listaejercicios',['ejercicios'=>json_encode($ejercicios_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appviews.creaejercicio',[]);
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

        if(array_key_exists('ejerc_cerrado',$alldata)){
             $alldata['ejerc_cerrado'] = true;
        }else{
            $alldata['ejerc_cerrado'] = false;
        }

        $ejercicio = new Ejercicio($alldata);

        $ejercicio->save();

        $fmessage = 'Se ha creado el ejercicio: '.$ejercicio->ejerc_anio;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'store', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('ejercicios.index');
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
        $ejercicio = Ejercicio::findOrFail($id);
        return view('appviews.editaejercicio',['ejercicio'=>$ejercicio]);
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
        $ejercicio = Ejercicio::findOrFail($id);

        $ejerc_cerrado = false;
        if(array_key_exists('ejerc_cerrado',$alldata)){
             $ejerc_cerrado = true;
        }

        $ejercicio->ejerc_anio = $alldata['ejerc_anio'];
        $ejercicio->ejerc_cerrado = $ejerc_cerrado;

        $ejercicio->save();

        $fmessage = 'Se ha actualizado el ejercicio: '.$ejercicio->ejerc_anio;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'update', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('ejercicios.index');
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
