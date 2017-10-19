<?php

use Illuminate\Database\Seeder;
use App\TipoSubCuenta;

class TipoSubCuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoSubCuenta::create( [
			'tiposubcta_nom'=>'Activo a corto plazo'
		]);

		TipoSubCuenta::create( [
			'tiposubcta_nom'=>'Activo a largo plazo'
		]);

		TipoSubCuenta::create( [
			'tiposubcta_nom'=>'Pasivo a corto plazo'
		]);

		TipoSubCuenta::create( [
			'tiposubcta_nom'=>'Pasivo a largo plazo'
		]);

		TipoSubCuenta::create( [
			'tiposubcta_nom'=>'Capital contable'
		]);

		TipoSubCuenta::create( [
			'tiposubcta_nom'=>'Ingresos'
		]);

		TipoSubCuenta::create( [
			'tiposubcta_nom'=>'Costos'
		]);

		TipoSubCuenta::create( [
			'tiposubcta_nom'=>'Gastos'
		]);

		TipoSubCuenta::create( [
			'tiposubcta_nom'=>'Resultado integral de financiamiento'
		]);

		TipoSubCuenta::create( [
			'tiposubcta_nom'=>'Cuentas de orden'
		]);
    }
}
