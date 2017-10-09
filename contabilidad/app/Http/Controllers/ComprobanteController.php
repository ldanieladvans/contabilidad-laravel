<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pago;
use App\Cuenta;
use App\Poliza;
use App\Comprobante;
use App\ComprobanteRel;
use App\Nomina;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ComprobanteController extends Controller
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
        $comprobantes = Comprobante::all();
        $comprobantes_list = array();
        $comprobantes_contador = 0;
        foreach ($comprobantes as $cb) {
            $comprobantes_list[$comprobantes_contador] = ['ID'=>$cb->id,'comp_uuid'=>$cb->comp_uuid,'comp_rfc_emisor'=>$cb->comp_rfc_emisor,'comp_rfc_receptor'=>$cb->comp_rfc_receptor,'comp_f_emision'=>$cb->comp_f_emision,'comp_complmto'=>$cb->comp_complmto,'comp_tipocomp'=>$cb->comp_tipocomp];
            $comprobantes_contador ++;
        }
        return view('appviews.listacomprobantes',['comprobantes'=>json_encode($comprobantes_list)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('appviews.creacomprobante',[]);
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

        $comp_espago = false;
        if(array_key_exists('comp_espago',$alldata)){
             $comp_espago = true;
        }
        $comp_imp_bov = false;
        if(array_key_exists('comp_imp_bov',$alldata)){
            $comp_imp_bov = true;
        }

        $alldata['comp_espago'] = $comp_espago;
        $alldata['comp_imp_bov'] = $comp_imp_bov;

        $comprobante = new Comprobante($alldata);

        $comprobante->save();

        $fmessage = 'Se ha creado el comprobante: '.$comprobante->comp_uuid;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'store', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('comprobantes.index');
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
        $comprobante = Comprobante::findOrFail($id);
        //TODO Buscar los objetos de relación uno a muchos

        $compsrel = ComprobanteRel::where('comprel_comp_id',$id)->get();
        $compsrel_list = array();
        $compsrel_contador = 0;

        foreach ($compsrel as $cp) {
            $compsrel_list[$compsrel_contador] = ['ID'=>$cp->id,'comprel_tiporel_nom'=>$cp->comprel_tiporel_nom,'comprel_tiporel_cod'=>$cp->comprel_tiporel_cod,'comprel_comp_rel_uuid'=>$cp->comprel_comp_rel_uuid];
            $compsrel_contador ++;
        }

        return view('appviews.editacomprobante',['comprobante'=>$comprobante,'compsrel'=>json_encode($compsrel_list)]);
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

        $comprobante = Comprobante::findOrFail($id);
        $comp_espago = false;
        if(array_key_exists('comp_espago',$alldata)){
             $comp_espago = true;
        }
        $comp_imp_bov = false;
        if(array_key_exists('comp_imp_bov',$alldata)){
            $comp_imp_bov = true;
        }

        $comprobante->comp_uuid = $alldata['comp_uuid'];
        $comprobante->comp_rfc_emisor = $alldata['comp_rfc_emisor'];
        $comprobante->comp_rfc_receptor = $alldata['comp_rfc_receptor'];
        $comprobante->comp_f_emision = $alldata['comp_f_emision'];
        $comprobante->comp_complmto = $alldata['comp_complmto'];
        $comprobante->comp_tipocomp = $alldata['comp_tipocomp'];
        $comprobante->comp_cbb_serie = $alldata['comp_cbb_serie'];
        $comprobante->comp_cbb_numfolio = $alldata['comp_cbb_numfolio'];
        $comprobante->comp_num_factelect = $alldata['comp_num_factelect'];
        $comprobante->comp_taxid = $alldata['comp_taxid'];
        $comprobante->comp_espago = $comp_espago;
        $comprobante->comp_imp_bov = $comp_imp_bov;

        $comprobante->save();
        $fmessage = 'Se ha actualizado el comprobante: '.$comprobante->comp_uuid;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'store', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('comprobantes.index');
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
