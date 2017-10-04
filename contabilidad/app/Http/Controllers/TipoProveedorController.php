<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\TipoProveedor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TipoProveedorController extends Controller
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
        $tproveedores = TipoProveedor::all();
        $tproveedores_list = array();
        $tproveedores_contador = 0;
        foreach ($tproveedores as $tcl) {
            $tproveedores_list[$tproveedores_contador] = ['ID'=>$tcl->id,'tipprov_desc'=>$tcl->tipprov_desc,'tipprov_concpto_polz'=>$tcl->tipprov_concpto_polz];
            $tproveedores_contador ++;
        }
        return view('appviews.listatproveedores',['tproveedores'=>json_encode($tproveedores_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appviews.creatproveedor',['tipprov_cta_egreso_id'=>[],'tipprov_cta_desc_id'=>[],'tipprov_cta_iva_acredit_x_cob_id'=>[],'tipprov_cta_iva_acredit_cob_id'=>[],'tipprov_cta_iva_reten_x_cob_id'=>[],'tipprov_cta_iva_reten_cob_id'=>[],'tipprov_cta_isr_reten_id'=>[],'tipprov_cta_por_pagar_id'=>[],'tipprov_cta_anticp_prov_id'=>[]]);
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
        $tproveedor = new TipoProveedor($alldata);
        $tproveedor->save();

        $fmessage = 'Se ha creado el tipo de proveedor: '.$tproveedor->tipprov_desc;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'store', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('tproveedores.index');
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
        $tproveedor = TipoProveedor::findOrFail($id);
        return view('appviews.editatproveedor',['tproveedor'=>$tproveedor,'tipprov_cta_egreso_id'=>[],'tipprov_cta_desc_id'=>[],'tipprov_cta_iva_acredit_x_cob_id'=>[],'tipprov_cta_iva_acredit_cob_id'=>[],'tipprov_cta_iva_reten_x_cob_id'=>[],'tipprov_cta_iva_reten_cob_id'=>[],'tipprov_cta_isr_reten_id'=>[],'tipprov_cta_por_pagar_id'=>[],'tipprov_cta_anticp_prov_id'=>[]]);
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
        $tproveedor = TipoProveedor::findOrFail($id);

        $tproveedor->tipprov_desc = $alldata['tipprov_desc'];
        $tproveedor->tipprov_concpto_polz = $alldata['tipprov_concpto_polz'];

        $tproveedor->tipprov_cta_egreso_id = $alldata['tipprov_cta_egreso_id'];
        $tproveedor->tipprov_cta_desc_id = $alldata['tipprov_cta_desc_id'];
        $tproveedor->tipprov_cta_iva_acredit_x_cob_id = $alldata['tipprov_cta_iva_acredit_x_cob_id'];
        $tproveedor->tipprov_cta_iva_acredit_cob_id = $alldata['tipprov_cta_iva_acredit_cob_id'];
        $tproveedor->tipprov_cta_iva_reten_x_cob_id = $alldata['tipprov_cta_iva_reten_x_cob_id'];
        $tproveedor->tipprov_cta_iva_reten_cob_id = $alldata['tipprov_cta_iva_reten_cob_id'];
        $tproveedor->tipprov_cta_isr_reten_id = $alldata['tipprov_cta_isr_reten_id'];
        $tproveedor->tipprov_cta_por_pagar_id = $alldata['tipprov_cta_por_pagar_id'];
        $tproveedor->tipprov_cta_anticp_prov_id = $alldata['tipprov_cta_anticp_prov_id'];

        $tproveedor->save();

        $fmessage = 'Se ha actualizado el tipo de proveedor: '.$alldata['tipprov_desc'];
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'update', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('tproveedores.index');
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
