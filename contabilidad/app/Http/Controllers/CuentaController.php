<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;
use App\TipoSubCuenta;
use App\CatSatModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CuentaController extends Controller
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
        $cuentas = Cuenta::all();
        $cuentas_list = array();
        $cuentas_contador = 0;
        foreach ($cuentas as $ct) {
            $cuentas_list[$cuentas_contador] = ['ID'=>$ct->id,'ctacont_num'=>$ct->getAccountNumberFormatted(),'ctacont_desc'=>$ct->ctacont_desc,'ctacont_tipocta_nom'=>$ct->ctacont_tipocta_nom,'ctacont_natur'=>$ct->ctacont_natur,'ctacont_catsat_cod'=>$ct->ctacont_catsat_cod];
            $cuentas_contador ++;
            //Log::info($ct->getAccountNumberFormatted());
        }
        return view('appviews.listacuentas',['cuentas'=>json_encode($cuentas_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO uncomment when connection to server available
        //$testconn = DB::connection('cat_sat')->select('select id from roles where id = ?',[1]);
        $sat_cta = CatSatModel::all();
        $tscuenta = TipoSubCuenta::all();
        /*echo "<pre>";
        print_r($tscuenta);
        die();
        echo "</pre>";*/
        return view('appviews.creacuenta',['ctacont_catsat_cod'=>$sat_cta,'ctacont_ts'=>$tscuenta]);
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
        /*echo "<pre>";
        print_r($alldata);
        die();
        echo "</pre>";*/
        $to_save_array['ctacont_num'] = $alldata['ctacont_num'];

        $to_save_array['ctacont_desc'] = $alldata['ctacont_desc'];
        $to_save_array['ctacont_f_iniciosat'] = $alldata['ctacont_f_iniciosat'];
        $to_save_array['ctacont_efectivo'] = false;
        

        if(array_key_exists('ctacont_natur',$alldata)){
            $to_save_array['ctacont_natur'] = $alldata['ctacont_natur'];
        }
        if(array_key_exists('ctacont_tipocta_nom',$alldata)){
            $to_save_array['ctacont_tipocta_nom'] = $alldata['ctacont_tipocta_nom'];
        }
        if(array_key_exists('ctacont_catsat_nom',$alldata)){
            $to_save_array['ctacont_catsat_nom'] = $alldata['ctacont_catsat_nom'];
        }
        if(array_key_exists('ctacont_efectivo',$alldata)){
            $to_save_array['ctacont_efectivo'] = true;
        }
        $to_save_array['ctacont_decalarada'] = false;
        if(array_key_exists('ctacont_decalarada',$alldata)){
            $to_save_array['ctacont_decalarada'] = true;
        }
        $to_save_array['ctacont_pte_complnt'] = false;
        if(array_key_exists('ctacont_pte_complnt',$alldata)){
            $to_save_array['ctacont_pte_complnt'] = true;
        }
        $to_save_array['ctacont_catsat_cod'] = '0000001';
        if(array_key_exists('ctacont_catsat_cod',$alldata)){
            $to_save_array['ctacont_catsat_cod'] = $alldata['ctacont_catsat_cod'];
        }
        $to_save_array['ctacont_tipocta_cod'] = 'debit';
        if(array_key_exists('ctacont_tipocta_cod',$alldata)){
            $to_save_array['ctacont_tipocta_cod'] = $alldata['ctacont_tipocta_cod'];
        }
        //TODO Uncomment
        /*$to_save_array['ctacont_tiposubcta_id'] = '00000011';
        if(array_key_exists('ctacont_tiposubcta_id',$alldata)){
            $to_save_array['ctacont_tiposubcta_id'] = $alldata['ctacont_tiposubcta_id'];
        }*/

        $cuenta = new Cuenta($to_save_array);
        $cuenta->save();

        $cuenta->initJournal('MXN');

        $fmessage = 'Se ha creado la cuenta: '.$cuenta->ctacont_num;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'store', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('cuentas.index');
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
        $cuenta = Cuenta::findOrFail($id);
        $sat_cta = CatSatModel::all();
        $tscuenta = TipoSubCuenta::all();
        return view('appviews.editacuenta',['cuenta'=>$cuenta,'ctacont_catsat_cod'=>$sat_cta,'ctacont_ts'=>$tscuenta]);
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
        $to_save_array['ctacont_num'] = $alldata['ctacont_num'];

        $to_save_array['ctacont_desc'] = $alldata['ctacont_desc'];
        $to_save_array['ctacont_f_iniciosat'] = $alldata['ctacont_f_iniciosat'];
        $to_save_array['ctacont_efectivo'] = false;
        

        if(array_key_exists('ctacont_natur',$alldata)){
            $to_save_array['ctacont_natur'] = $alldata['ctacont_natur'];
        }
        if(array_key_exists('ctacont_tipocta_nom',$alldata)){
            $to_save_array['ctacont_tipocta_nom'] = $alldata['ctacont_tipocta_nom'];
        }
        if(array_key_exists('ctacont_catsat_nom',$alldata)){
            $to_save_array['ctacont_catsat_nom'] = $alldata['ctacont_catsat_nom'];
        }
        if(array_key_exists('ctacont_efectivo',$alldata)){
            $to_save_array['ctacont_efectivo'] = true;
        }
        $to_save_array['ctacont_decalarada'] = false;
        if(array_key_exists('ctacont_decalarada',$alldata)){
            $to_save_array['ctacont_decalarada'] = true;
        }
        $to_save_array['ctacont_pte_complnt'] = false;
        if(array_key_exists('ctacont_pte_complnt',$alldata)){
            $to_save_array['ctacont_pte_complnt'] = true;
        }
        $to_save_array['ctacont_catsat_cod'] = '0000001';
        if(array_key_exists('ctacont_catsat_cod',$alldata)){
            $to_save_array['ctacont_catsat_cod'] = $alldata['ctacont_catsat_cod'];
        }
        $to_save_array['ctacont_tipocta_cod'] = 'debit';
        if(array_key_exists('ctacont_tipocta_cod',$alldata)){
            $to_save_array['ctacont_tipocta_cod'] = $alldata['ctacont_tipocta_cod'];
        }

        $cuenta = Cuenta::findOrFail($id);
        $cuenta->ctacont_num = $to_save_array['ctacont_num'];
        $cuenta->ctacont_desc = $to_save_array['ctacont_desc'];
        $cuenta->ctacont_f_iniciosat = $to_save_array['ctacont_f_iniciosat'];
        $cuenta->ctacont_efectivo = $to_save_array['ctacont_efectivo'];
        $cuenta->ctacont_natur = $to_save_array['ctacont_natur'];
        $cuenta->ctacont_tipocta_nom = $to_save_array['ctacont_tipocta_nom'];
        $cuenta->ctacont_catsat_nom = $to_save_array['ctacont_catsat_nom'];
        $cuenta->ctacont_decalarada = $to_save_array['ctacont_decalarada'];
        $cuenta->ctacont_pte_complnt = $to_save_array['ctacont_pte_complnt'];
        $cuenta->ctacont_catsat_cod = $to_save_array['ctacont_catsat_cod'];
        $cuenta->ctacont_tipocta_cod = $to_save_array['ctacont_tipocta_cod'];

        $cuenta->save();

        $fmessage = 'Se ha actualizado la cuenta: '.$cuenta->ctacont_num;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'update', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('cuentas.index');

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
