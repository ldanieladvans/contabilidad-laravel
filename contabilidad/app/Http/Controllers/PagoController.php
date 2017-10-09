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
        $alldata = $request->all();
        $logued_user = Auth::user();
        $pago = new Pago($alldata);

        $pago->save();
        $fmessage = 'Se ha creado el pago: '.$pago->pago_numoperc;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'store', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('pagos.index');
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
        $pago = Pago::findOrFail($id);
        return view('appviews.editapago',['pago'=>$pago,'pago_formpago_cod'=>[],'pago_moneda_cod'=>[],'pago_polz_id'=>[],'pago_comp_id'=>[]]);
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
        $pago = Pago::findOrFail($id);

        if(array_key_exists('pago_numoperc',$alldata)){
            $pago->pago_numoperc = $alldata['pago_numoperc'];
        }
        if(array_key_exists('pago_monto',$alldata)){
            $pago->pago_monto = $alldata['pago_monto'];
        }
        if(array_key_exists('pago_fecha',$alldata)){
            $pago->pago_fecha = $alldata['pago_fecha'];
        }
        if(array_key_exists('pago_tipo_cambio',$alldata)){
            $pago->pago_tipo_cambio = $alldata['pago_tipo_cambio'];
        }
        if(array_key_exists('pago_rfcemisor_ctaord',$alldata)){
            $pago->pago_rfcemisor_ctaord = $alldata['pago_rfcemisor_ctaord'];
        }
        if(array_key_exists('pago_nombanc_emisor',$alldata)){
            $pago->pago_nombanc_emisor = $alldata['pago_nombanc_emisor'];
        }
        if(array_key_exists('pago_nombanc_ordext',$alldata)){
            $pago->pago_nombanc_ordext = $alldata['pago_nombanc_ordext'];
        }
        if(array_key_exists('pago_cta_ordnte',$alldata)){
            $pago->pago_cta_ordnte = $alldata['pago_cta_ordnte'];
        }
        if(array_key_exists('pago_sello_pago',$alldata)){
            $pago->pago_sello_pago = $alldata['pago_sello_pago'];
        }
        if(array_key_exists('pago_rfcrecept_ctaben',$alldata)){
            $pago->pago_rfcrecept_ctaben = $alldata['pago_rfcrecept_ctaben'];
        }
        if(array_key_exists('pago_banc_dest',$alldata)){
            $pago->pago_banc_dest = $alldata['pago_banc_dest'];
        }
        if(array_key_exists('pago_banc_dest_ext',$alldata)){
            $pago->pago_banc_dest_ext = $alldata['pago_banc_dest_ext'];
        }
        if(array_key_exists('pago_cta_ben',$alldata)){
            $pago->pago_cta_ben = $alldata['pago_cta_ben'];
        }
        if(array_key_exists('pago_numcheq',$alldata)){
            $pago->pago_numcheq = $alldata['pago_numcheq'];
        }

        if(array_key_exists('pago_benef',$alldata)){
            $pago->pago_benef = $alldata['pago_benef'];
        }
        if(array_key_exists('pago_cert_pago',$alldata)){
            $pago->pago_cert_pago = $alldata['pago_cert_pago'];
        }
        if(array_key_exists('pago_formpago_cod',$alldata)){
            $pago->pago_formpago_cod = $alldata['pago_formpago_cod'];
        }
        if(array_key_exists('pago_moneda_cod',$alldata)){
            $pago->pago_moneda_cod = $alldata['pago_moneda_cod'];
        }
        if(array_key_exists('pago_polz_id',$alldata)){
            $pago->pago_polz_id = $alldata['pago_polz_id'];
        }
        if(array_key_exists('pago_comp_id',$alldata)){
            $pago->pago_comp_id = $alldata['pago_comp_id'];
        }

        $pago->save();

        $fmessage = 'Se ha actualizado el pago: '.$pago->pago_numoperc;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'update', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('pagos.index');
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
