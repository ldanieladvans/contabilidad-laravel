<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoSubCuenta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TipoSubCuentaController extends Controller
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
        $tsubcuentas = TipoSubCuenta::all();
        $tsubcuentas_list = array();
        $tsubcuentas_contador = 0;
        foreach ($tsubcuentas as $sct) {
            $tsubcuentas_list[$tsubcuentas_contador] = ['ID'=>$sct->id,'tiposubcta_nom'=>$sct->tiposubcta_nom,'tiposubcta_mostrar_tab'=>$sct->tiposubcta_mostrar_tab ? 'Si':'No'];
            $tsubcuentas_contador ++;
        }
        return view('appviews.listatsubcuentas',['tsubcuentas'=>json_encode($tsubcuentas_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appviews.creatsubcuenta',[]);
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
        $to_save_array = array();

        $to_save_array['tiposubcta_nom'] = $alldata['tiposubcta_nom'];
        $tiposubcta_mostrar_tab = false;
        if(array_key_exists('tiposubcta_mostrar_tab',$alldata)){
            $tiposubcta_mostrar_tab = true;
        }

        $to_save_array['tiposubcta_mostrar_tab'] = $tiposubcta_mostrar_tab;

        $tsubcuenta = new TipoSubCuenta($to_save_array);
        $tsubcuenta->save();

        $fmessage = 'Se ha creado el tipo de subcuenta: '.$tsubcuenta->tiposubcta_nom;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'store', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('tsubcuentas.index');

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
        $tsubcuenta = TipoSubCuenta::findOrFail($id);
        return view('appviews.editatsubcuenta',['tsubcuenta'=>$tsubcuenta]);
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
        $to_save_array = array();

        $to_save_array['tiposubcta_nom'] = $alldata['tiposubcta_nom'];
        $tiposubcta_mostrar_tab = false;
        if(array_key_exists('tiposubcta_mostrar_tab',$alldata)){
            $tiposubcta_mostrar_tab = true;
        }

        $to_save_array['tiposubcta_mostrar_tab'] = $tiposubcta_mostrar_tab;
        $tsubcuenta = TipoSubCuenta::findOrFail($id);

        $tsubcuenta->tiposubcta_nom = $to_save_array['tiposubcta_nom'];
        $tsubcuenta->tiposubcta_mostrar_tab = $to_save_array['tiposubcta_mostrar_tab'];

        $tsubcuenta->save();

        $fmessage = 'Se ha actualizado el tipo de sub-cuenta: '.$tsubcuenta->tiposubcta_nom;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'update', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('tsubcuentas.index');
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
