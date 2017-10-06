<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormaPago;
use App\Cuenta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FormaPagoController extends Controller
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
        $fspago = FormaPago::all();
        $fspago_list = array();
        $fspago_contador = 0;
        foreach ($fspago as $fp) {
            $fspago_list[$fspago_contador] = ['ID'=>$fp->id,'formpago_formpagosat_nom'=>$fp->formpago_formpagosat_nom,'formpago_formpagosat_cod'=>$fp->formpago_formpagosat_cod,'formpago_ctacont_id'=>$fp->cuenta->ctacont_num];
            $fspago_contador ++;
        }
        return view('appviews.listafspago',['fspago'=>json_encode($fspago_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuentas = Cuenta::all();
        return view('appviews.creafpago',['cuentas'=>$cuentas]);
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
        $fpago = new FormaPago($alldata);

        $fpago->save();
        $fmessage = 'Se ha creado la forma de pago: '.$fpago->formpago_formpagosat_nom;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'store', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('fspago.index');
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
        $cuentas = Cuenta::all();
        $fpago = FormaPago::findOrFail($id);
        return view('appviews.editafpago',['fpago'=>$fpago,'cuentas'=>$cuentas]);
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

        $fpago = FormaPago::findOrFail($id);
        if(array_key_exists('formpago_formpagosat_nom',$alldata)){
            $fpago->formpago_formpagosat_nom = $alldata['formpago_formpagosat_nom'];
        }
        if(array_key_exists('formpago_formpagosat_cod',$alldata)){
            $fpago->formpago_formpagosat_cod = $alldata['formpago_formpagosat_cod'];
        }
        if(array_key_exists('formpago_ctacont_id',$alldata)){
            $fpago->formpago_ctacont_id = $alldata['formpago_ctacont_id'];
        }
        $fpago->save();

        $fmessage = 'Se ha actualizado la forma de pago: '.$fpago->formpago_formpagosat_nom;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'update', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('fspago.index');

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
