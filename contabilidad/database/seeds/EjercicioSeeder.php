<?php

use Illuminate\Database\Seeder;
use App\Ejercicio;

class EjercicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ejercicio2017 = new Ejercicio();
        $ejercicio2017->ejerc_anio = '2017';
        $ejercicio2017->save();
        $ejercicio2018 = new Ejercicio();
        $ejercicio2018->ejerc_anio = '2018';
        $ejercicio2018->save();
    }
}
