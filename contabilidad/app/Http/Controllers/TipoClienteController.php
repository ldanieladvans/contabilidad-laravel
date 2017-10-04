<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\TipoCliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TipoClienteController extends Controller
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
        $tclientes = TipoCliente::all();
        $tclientes_list = array();
        $tclientes_contador = 0;
        foreach ($tclientes as $tcl) {
            $tclientes_list[$tclientes_contador] = ['ID'=>$tcl->id,'tipcliente_desc'=>$tcl->tipcliente_desc,'tipcliente_concpto_polz'=>$tcl->tipcliente_concpto_polz];
            $tclientes_contador ++;
        }
        return view('appviews.listatclientes',['tclientes'=>json_encode($tclientes_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appviews.creatcliente',['tipcliente_cta_ingreso_id'=>[],'tipcliente_cta_desc_id'=>[],'tipcliente_cta_iva_traslad_x_cob_id'=>[],'tipcliente_cta_iva_traslad_cob_id'=>[],'tipcliente_cta_iva_reten_x_cob_id'=>[],'tipcliente_cta_iva_reten_cob_id'=>[],'tipcliente_cta_isr_reten_id'=>[],'tipcliente_cta_por_cobrar_id'=>[],'tipcliente_cta_anticp_client_id'=>[]]);
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
        $tcliente = new TipoCliente($alldata);
        $tcliente->save();

        $fmessage = 'Se ha creado el tipo de cliente: '.$tcliente->tipcliente_desc;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'store', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('tclientes.index');
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
        $tcliente = TipoCliente::findOrFail($id);
        return view('appviews.editatcliente',['tcliente'=>$tcliente,'tipcliente_cta_ingreso_id'=>[],'tipcliente_cta_desc_id'=>[],'tipcliente_cta_iva_traslad_x_cob_id'=>[],'tipcliente_cta_iva_traslad_cob_id'=>[],'tipcliente_cta_iva_reten_x_cob_id'=>[],'tipcliente_cta_iva_reten_cob_id'=>[],'tipcliente_cta_isr_reten_id'=>[],'tipcliente_cta_por_cobrar_id'=>[],'tipcliente_cta_anticp_client_id'=>[]]);
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
        $tcliente = TipoCliente::findOrFail($id);
        $tcliente->tipcliente_desc = $alldata['tipcliente_desc'];
        $tcliente->tipcliente_concpto_polz = $alldata['tipcliente_concpto_polz'];

        $tcliente->tipcliente_cta_ingreso_id = $alldata['tipcliente_cta_ingreso_id'];
        $tcliente->tipcliente_cta_desc_id = $alldata['tipcliente_cta_desc_id'];
        $tcliente->tipcliente_cta_iva_traslad_x_cob_id = $alldata['tipcliente_cta_iva_traslad_x_cob_id'];
        $tcliente->tipcliente_cta_iva_traslad_cob_id = $alldata['tipcliente_cta_iva_traslad_cob_id'];
        $tcliente->tipcliente_cta_iva_reten_x_cob_id = $alldata['tipcliente_cta_iva_reten_x_cob_id'];
        $tcliente->tipcliente_cta_iva_reten_cob_id = $alldata['tipcliente_cta_iva_reten_cob_id'];
        $tcliente->tipcliente_cta_isr_reten_id = $alldata['tipcliente_cta_isr_reten_id'];
        $tcliente->tipcliente_cta_por_cobrar_id = $alldata['tipcliente_cta_por_cobrar_id'];
        $tcliente->tipcliente_cta_anticp_client_id = $alldata['tipcliente_cta_anticp_client_id'];

        $tcliente->save();

        $fmessage = 'Se ha actualizado el tipo de cliente: '.$alldata['tipcliente_desc'];
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'update', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('tclientes.index');
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
