<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poliza;
use App\Balanza;
use App\Comprobante;

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


        $balanzas = Balanza::all();
        $balanzas_list = array();
        $balanzas_contador = 0;
        foreach ($balanzas as $bl) {
            $balanzas_list[$balanzas_contador] = ['ID'=>$bl->id,'blnza_ctacont_id'=>$bl->cuenta ? $bl->cuenta->ctacont_num.'-'.$bl->cuenta->ctacont_desc : '','blnza_period_id'=>$bl->periodo ? $bl->periodo->period_fecha_fin : '','blnza_saldo_inicial'=>$bl->blnza_saldo_inicial,'blnza_cargos'=>$bl->blnza_cargos,'blnza_abonos'=>$bl->blnza_abonos,'blnza_saldo_final'=>$bl->blnza_saldo_final];
            $balanzas_contador ++;
        }


        $compall = Comprobante::all();
        $compall_count = count($compall);

        $comp_contblz = Comprobante::where('comp_contblz',false)->get();
        $comp_contblz_count = count($comp_contblz);

        $comp_percent = 0;
        if($compall_count != 0){
            $comp_percent = round(($comp_contblz_count / $compall_count) * 100,2);
        }

        $polz_sin_reclsif_imp = Poliza::where('polz_sin_reclsif_imp',true)->get();
        $polz_sin_reclsif_imp_count = count($polz_sin_reclsif_imp);
        $polz_sin_reclsif_imp_percent = 0;
        if($polz_sin_reclsif_imp_count != 0){
            $polz_sin_reclsif_imp_percent = round(($polz_sin_reclsif_imp_count / count($polizas)) * 100,2);
        }

        $polz_defecto = Poliza::where('polz_defecto',true)->get();
        $polz_defecto_count = count($polz_defecto);
        $polz_defecto_percent = 0;
        if($polz_defecto_count != 0){
            $polz_defecto_percent = round(($polz_defecto_count / count($polizas)) * 100,2);
        }

        return view('home',['polizas'=>json_encode($polizas_list),'balanzas'=>json_encode($balanzas_list),'comp_contblz_count'=>$comp_contblz_count,'comp_percent'=>$comp_percent,'polz_sin_reclsif_imp_count'=>$polz_sin_reclsif_imp_count,'polz_sin_reclsif_imp_percent'=>$polz_sin_reclsif_imp_percent,'polz_defecto_count'=>$polz_defecto_count,'polz_defecto_percent'=>$polz_defecto_percent]);
    }
}
