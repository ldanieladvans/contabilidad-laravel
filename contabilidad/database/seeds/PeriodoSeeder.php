<?php

use Illuminate\Database\Seeder;
use App\Ejercicio;
use App\Periodo;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Periodos 2017*/
        $ejercicio2017 = Ejercicio::where('ejerc_anio','2017')->get();
        if(count($ejercicio2017) > 0){
        	$ejercicio2017 = $ejercicio2017[0]->id;
        }

        $enero2017 = new Periodo();
        $enero2017->period_fecha_ini = date('Y-m-d',strtotime("2017-01-01"));
        $enero2017->period_fecha_fin = date('Y-m-d',strtotime("2017-01-31"));
        $enero2017->period_ejerc_id = $ejercicio2017;
        $enero2017->save();

        $febrero2017 = new Periodo();
        $febrero2017->period_fecha_ini = date('Y-m-d',strtotime("2017-02-01"));
        $febrero2017->period_fecha_fin = date('Y-m-d',strtotime("2017-02-28"));
        $febrero2017->period_ejerc_id = $ejercicio2017;
        $febrero2017->save();

        $marzo2017 = new Periodo();
        $marzo2017->period_fecha_ini = date('Y-m-d',strtotime("2017-03-01"));
        $marzo2017->period_fecha_fin = date('Y-m-d',strtotime("2017-03-31"));
        $marzo2017->period_ejerc_id = $ejercicio2017;
        $marzo2017->save();

        $abril2017 = new Periodo();
        $abril2017->period_fecha_ini = date('Y-m-d',strtotime("2017-04-01"));
        $abril2017->period_fecha_fin = date('Y-m-d',strtotime("2017-04-30"));
        $abril2017->period_ejerc_id = $ejercicio2017;
        $abril2017->save();

        $mayo2017 = new Periodo();
        $mayo2017->period_fecha_ini = date('Y-m-d',strtotime("2017-05-01"));
        $mayo2017->period_fecha_fin = date('Y-m-d',strtotime("2017-05-31"));
        $mayo2017->period_ejerc_id = $ejercicio2017;
        $mayo2017->save();

        $junio2017 = new Periodo();
        $junio2017->period_fecha_ini = date('Y-m-d',strtotime("2017-06-01"));
        $junio2017->period_fecha_fin = date('Y-m-d',strtotime("2017-06-30"));
        $junio2017->period_ejerc_id = $ejercicio2017;
        $junio2017->save();

        $julio2017 = new Periodo();
        $julio2017->period_fecha_ini = date('Y-m-d',strtotime("2017-07-01"));
        $julio2017->period_fecha_fin = date('Y-m-d',strtotime("2017-07-31"));
        $julio2017->period_ejerc_id = $ejercicio2017;
        $julio2017->save();

        $agosto2017 = new Periodo();
        $agosto2017->period_fecha_ini = date('Y-m-d',strtotime("2017-08-01"));
        $agosto2017->period_fecha_fin = date('Y-m-d',strtotime("2017-08-31"));
        $agosto2017->period_ejerc_id = $ejercicio2017;
        $agosto2017->save();

        $septiembre2017 = new Periodo();
        $septiembre2017->period_fecha_ini = date('Y-m-d',strtotime("2017-09-01"));
        $septiembre2017->period_fecha_fin = date('Y-m-d',strtotime("2017-09-30"));
        $septiembre2017->period_ejerc_id = $ejercicio2017;
        $septiembre2017->save();

        $octubre2017 = new Periodo();
        $octubre2017->period_fecha_ini = date('Y-m-d',strtotime("2017-10-01"));
        $octubre2017->period_fecha_fin = date('Y-m-d',strtotime("2017-10-31"));
        $octubre2017->period_ejerc_id = $ejercicio2017;
        $octubre2017->save();

        $noviembre2017 = new Periodo();
        $noviembre2017->period_fecha_ini = date('Y-m-d',strtotime("2017-11-01"));
        $noviembre2017->period_fecha_fin = date('Y-m-d',strtotime("2017-11-30"));
        $noviembre2017->period_ejerc_id = $ejercicio2017;
        $noviembre2017->save();

        $diciembre2017 = new Periodo();
        $diciembre2017->period_fecha_ini = date('Y-m-d',strtotime("2017-12-01"));
        $diciembre2017->period_fecha_fin = date('Y-m-d',strtotime("2017-12-31"));
        $diciembre2017->period_ejerc_id = $ejercicio2017;
        $diciembre2017->save();

        
        /*Periodos 2018*/
        $ejercicio2018 = Ejercicio::where('ejerc_anio','2018')->get();
        if(count($ejercicio2018) > 0){
        	$ejercicio2018 = $ejercicio2018[0]->id;
        }

        $enero2018 = new Periodo();
        $enero2018->period_fecha_ini = date('Y-m-d',strtotime("2018-01-01"));
        $enero2018->period_fecha_fin = date('Y-m-d',strtotime("2018-01-31"));
        $enero2018->period_ejerc_id = $ejercicio2018;
        $enero2018->save();

        $febrero2018 = new Periodo();
        $febrero2018->period_fecha_ini = date('Y-m-d',strtotime("2018-02-01"));
        $febrero2018->period_fecha_fin = date('Y-m-d',strtotime("2018-02-28"));
        $febrero2018->period_ejerc_id = $ejercicio2018;
        $febrero2018->save();

        $marzo2018 = new Periodo();
        $marzo2018->period_fecha_ini = date('Y-m-d',strtotime("2018-03-01"));
        $marzo2018->period_fecha_fin = date('Y-m-d',strtotime("2018-03-31"));
        $marzo2018->period_ejerc_id = $ejercicio2018;
        $marzo2018->save();

        $abril2018 = new Periodo();
        $abril2018->period_fecha_ini = date('Y-m-d',strtotime("2018-04-01"));
        $abril2018->period_fecha_fin = date('Y-m-d',strtotime("2018-04-30"));
        $abril2018->period_ejerc_id = $ejercicio2018;
        $abril2018->save();

        $mayo2018 = new Periodo();
        $mayo2018->period_fecha_ini = date('Y-m-d',strtotime("2018-05-01"));
        $mayo2018->period_fecha_fin = date('Y-m-d',strtotime("2018-05-31"));
        $mayo2018->period_ejerc_id = $ejercicio2018;
        $mayo2018->save();

        $junio2018 = new Periodo();
        $junio2018->period_fecha_ini = date('Y-m-d',strtotime("2018-06-01"));
        $junio2018->period_fecha_fin = date('Y-m-d',strtotime("2018-06-30"));
        $junio2018->period_ejerc_id = $ejercicio2018;
        $junio2018->save();

        $julio2018 = new Periodo();
        $julio2018->period_fecha_ini = date('Y-m-d',strtotime("2018-07-01"));
        $julio2018->period_fecha_fin = date('Y-m-d',strtotime("2018-07-31"));
        $julio2018->period_ejerc_id = $ejercicio2018;
        $julio2018->save();

        $agosto2018 = new Periodo();
        $agosto2018->period_fecha_ini = date('Y-m-d',strtotime("2018-08-01"));
        $agosto2018->period_fecha_fin = date('Y-m-d',strtotime("2018-08-31"));
        $agosto2018->period_ejerc_id = $ejercicio2018;
        $agosto2018->save();

        $septiembre2018 = new Periodo();
        $septiembre2018->period_fecha_ini = date('Y-m-d',strtotime("2018-09-01"));
        $septiembre2018->period_fecha_fin = date('Y-m-d',strtotime("2018-09-30"));
        $septiembre2018->period_ejerc_id = $ejercicio2018;
        $septiembre2018->save();

        $octubre2018 = new Periodo();
        $octubre2018->period_fecha_ini = date('Y-m-d',strtotime("2018-10-01"));
        $octubre2018->period_fecha_fin = date('Y-m-d',strtotime("2018-10-31"));
        $octubre2018->period_ejerc_id = $ejercicio2018;
        $octubre2018->save();

        $noviembre2018 = new Periodo();
        $noviembre2018->period_fecha_ini = date('Y-m-d',strtotime("2018-11-01"));
        $noviembre2018->period_fecha_fin = date('Y-m-d',strtotime("2018-11-30"));
        $noviembre2018->period_ejerc_id = $ejercicio2018;
        $noviembre2018->save();

        $diciembre2018 = new Periodo();
        $diciembre2018->period_fecha_ini = date('Y-m-d',strtotime("2018-12-01"));
        $diciembre2018->period_fecha_fin = date('Y-m-d',strtotime("2018-12-31"));
        $diciembre2018->period_ejerc_id = $ejercicio2018;
        $diciembre2018->save();



    }
}
