<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poliza;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polizas = Poliza::all();
        $polizas_list = array();
        $polizas_contador = 0;
        foreach ($polizas as $pz) {
            $polizas_list[$polizas_contador] = ['ID'=>$pz->id,'polz_concepto'=>$pz->polz_concepto,'polz_tipopolz'=>$pz->polz_tipopolz,'polz_fecha'=>$pz->polz_fecha,'polz_folio'=>$pz->polz_folio,'polz_importe'=>$pz->polz_importe,'polz_period_id'=>$pz->periodo->period_fecha_ini.' - '.$pz->periodo->period_fecha_fin];
            $polizas_contador ++;
        }
        return view('home',['polizas'=>json_encode($polizas_list)]);
    }
}
