<?php

use Illuminate\Database\Seeder;
use App\CatSatModel;
use App\TipoSubCuenta;
use App\Cuenta;

class CuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //TODO reemplazar por arbol de cuenta final
    public function run()
    {
        $tipo_cuenta_arr = ['Activo'=>'activo','Pasivo'=>'pasivo','Capital'=>'capital','Ingresos'=>'ingresos','Gastos'=>'gastos','Orden'=>'orden','Resultados'=>'resultados'];

        /*$tipo_subcuenta_arr = ['Activoacortoplazo'=>'activo_a_corto_plazo','Activoalargoplazo'=>'activo_a_largo_plazo','Pasivoacortoplazo'=>'pasivo_a_corto_plazo','Pasivoalargoplazo'=>'pasivo_a_largo_plazo','Capitalcontable'=>'capital_contable','Ingresos'=>'ingresos','Gastos'=>'gastos','Resultadointegraldefinanciamiento'=>'resultado_integral_de_financiamiento','Cuentasdeorden'=>'cuentas_de_orden'];*/

        $tipo_subcuenta_arr = array();
        $catsats = CatSatModel::all();

        $tscuentas = TipoSubCuenta::all();

        foreach ($tscuentas as $ts) {
        	$tipo_subcuenta_arr[str_replace(' ', '', $ts->tiposubcta_nom)] = $ts->id;
        }


        //TODO reemplazar por 
        foreach ($catsats as $ct) {
        	$cuenta = new Cuenta();

        	$cuenta->ctacont_catsat_cod = $ct->cat_sat_codigo_agrupador;
        	$cuenta->ctacont_catsat_nom = $ct->cat_sat_nombre_cuenta;
        	$cuenta->ctacont_tipocta_cod = $tipo_cuenta_arr[str_replace(' ', '', $ct->cat_sat_tipo)];
        	$cuenta->ctacont_tipocta_nom = $ct->cat_sat_tipo;
        	$cuenta->ctacont_num = '00000'.str_replace('.', '', (string)$ct->cat_sat_codigo_agrupador);
        	$cuenta->ctacont_desc = $ct->cat_sat_nombre_cuenta;
        	$cuenta->ctacont_tiposubcta_id = $tipo_subcuenta_arr[str_replace(' ', '', $ct->cat_sat_subtipo)];
        	$cuenta->save();
        }
    }
}
