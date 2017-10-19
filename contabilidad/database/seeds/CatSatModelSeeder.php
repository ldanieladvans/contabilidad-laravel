<?php

use Illuminate\Database\Seeder;
use App\CatSatModel;

class CatSatModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>101.00,
'cat_sat_nombre_cuenta'=>'Caja',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>101.01,
'cat_sat_nombre_cuenta'=>'Caja y efectivo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>102.00,
'cat_sat_nombre_cuenta'=>'Bancos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>102.01,
'cat_sat_nombre_cuenta'=>'Bancos nacionales',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>102.02,
'cat_sat_nombre_cuenta'=>'Bancos extranjeros',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>103.00,
'cat_sat_nombre_cuenta'=>'Inversiones',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>103.01,
'cat_sat_nombre_cuenta'=>'Inversiones temporales',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>103.02,
'cat_sat_nombre_cuenta'=>'Inversiones en fideicomisos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>103.03,
'cat_sat_nombre_cuenta'=>'Otras inversiones',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>104.00,
'cat_sat_nombre_cuenta'=>'Otros instrumentos financieros',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>104.01,
'cat_sat_nombre_cuenta'=>'Otros instrumentos financieros',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>105.00,
'cat_sat_nombre_cuenta'=>'Clientes',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>105.01,
'cat_sat_nombre_cuenta'=>'Clientes nacionales',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>105.02,
'cat_sat_nombre_cuenta'=>'Clientes extranjeros',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>105.03,
'cat_sat_nombre_cuenta'=>'Clientes nacionales parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>105.04,
'cat_sat_nombre_cuenta'=>'Clientes extranjeros parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>106.00,
'cat_sat_nombre_cuenta'=>'Cuentas y documentos por cobrar a corto plazo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>106.01,
'cat_sat_nombre_cuenta'=>'Cuentas y documentos por cobrar a corto plazo nacional',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>106.02,
'cat_sat_nombre_cuenta'=>'Cuentas y documentos por cobrar a corto plazo extranjero',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>106.03,
'cat_sat_nombre_cuenta'=>'Cuentas y documentos por cobrar a corto plazo nacional parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>106.04,
'cat_sat_nombre_cuenta'=>'Cuentas y documentos por cobrar a corto plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>106.05,
'cat_sat_nombre_cuenta'=>'Intereses por cobrar a corto plazo nacional',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>106.06,
'cat_sat_nombre_cuenta'=>'Intereses por cobrar a corto plazo extranjero',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>106.07,
'cat_sat_nombre_cuenta'=>'Intereses por cobrar a corto plazo nacional parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>106.08,
'cat_sat_nombre_cuenta'=>'Intereses por cobrar a corto plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>106.09,
'cat_sat_nombre_cuenta'=>'Otras Cuentas y documentos por cobrar a corto plazo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>106.10,
'cat_sat_nombre_cuenta'=>'Otras Cuentas y documentos por cobrar a corto plazo parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>107.00,
'cat_sat_nombre_cuenta'=>'Deudores diversos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>107.01,
'cat_sat_nombre_cuenta'=>'Funcionarios y empleados',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>107.02,
'cat_sat_nombre_cuenta'=>'Socios y accionistas',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>107.03,
'cat_sat_nombre_cuenta'=>'Partes relacionadas nacionales',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>107.04,
'cat_sat_nombre_cuenta'=>'Partes relacionadas extranjeros',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>107.05,
'cat_sat_nombre_cuenta'=>'Otros deudores diversos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>108.00,
'cat_sat_nombre_cuenta'=>'Estimación de Cuentas incobrables',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>108.01,
'cat_sat_nombre_cuenta'=>'Estimación de Cuentas incobrables nacional',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>108.02,
'cat_sat_nombre_cuenta'=>'Estimación de Cuentas incobrables extranjero',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>108.03,
'cat_sat_nombre_cuenta'=>'Estimación de Cuentas incobrables nacional parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>108.04,
'cat_sat_nombre_cuenta'=>'Estimación de Cuentas incobrables extranjero parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>109.00,
'cat_sat_nombre_cuenta'=>'Pagos anticipados',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.01,
'cat_sat_nombre_cuenta'=>'Seguros y fianzas pagados por anticipado nacional',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.02,
'cat_sat_nombre_cuenta'=>'Seguros y fianzas pagados por anticipado extranjero',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.03,
'cat_sat_nombre_cuenta'=>'Seguros y fianzas pagados por anticipado nacional parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.04,
'cat_sat_nombre_cuenta'=>'Seguros y fianzas pagados por anticipado extranjero parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.05,
'cat_sat_nombre_cuenta'=>'Rentas pagados por anticipado nacional',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.06,
'cat_sat_nombre_cuenta'=>'Rentas pagados por anticipado extranjero',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.07,
'cat_sat_nombre_cuenta'=>'Rentas pagados por anticipado nacional parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.08,
'cat_sat_nombre_cuenta'=>'Rentas pagados por anticipado extranjero parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.09,
'cat_sat_nombre_cuenta'=>'Intereses pagados por anticipado nacional',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.10,
'cat_sat_nombre_cuenta'=>'Intereses pagados por anticipado extranjero',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.11,
'cat_sat_nombre_cuenta'=>'Intereses pagados por anticipado nacional parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.12,
'cat_sat_nombre_cuenta'=>'Intereses pagados por anticipado extranjero parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.13,
'cat_sat_nombre_cuenta'=>'Factoraje financiero pagados por anticipado nacional',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.14,
'cat_sat_nombre_cuenta'=>'Factoraje financiero pagados por anticipado extranjero',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.15,
'cat_sat_nombre_cuenta'=>'Factoraje financiero pagados por anticipado nacional parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.16,
'cat_sat_nombre_cuenta'=>'Factoraje financiero pagados por anticipado extranjero parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.17,
'cat_sat_nombre_cuenta'=>'Arrendamiento financiero pagados por anticipado nacional',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.18,
'cat_sat_nombre_cuenta'=>'Arrendamiento financiero pagados por anticipado extranjero',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.19,
'cat_sat_nombre_cuenta'=>'Arrendamiento financiero pagados por anticipado nacional parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.20,
'cat_sat_nombre_cuenta'=>'Arrendamiento financiero pagados por anticipado extranjero parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.21,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro de pagos anticipados',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.22,
'cat_sat_nombre_cuenta'=>'Derechos fiduciarios',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>109.23,
'cat_sat_nombre_cuenta'=>'Otros pagos anticipados',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>110.00,
'cat_sat_nombre_cuenta'=>'Subsidio al empleo por aplicar',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>110.01,
'cat_sat_nombre_cuenta'=>'Subsidio al empleo por aplicar',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>111.00,
'cat_sat_nombre_cuenta'=>'Crédito al diesel por acreditar',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>111.01,
'cat_sat_nombre_cuenta'=>'Crédito al diesel por acreditar',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>112.00,
'cat_sat_nombre_cuenta'=>'Otros estímulos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>112.01,
'cat_sat_nombre_cuenta'=>'Otros estímulos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>113.00,
'cat_sat_nombre_cuenta'=>'Impuestos a favor',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>113.01,
'cat_sat_nombre_cuenta'=>'IVA a favor',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>113.02,
'cat_sat_nombre_cuenta'=>'ISR a favor',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>113.03,
'cat_sat_nombre_cuenta'=>'IETU a favor',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>113.04,
'cat_sat_nombre_cuenta'=>'IDE a favor',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>113.05,
'cat_sat_nombre_cuenta'=>'IA a favor',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>113.06,
'cat_sat_nombre_cuenta'=>'Subsidio al empleo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>113.07,
'cat_sat_nombre_cuenta'=>'Pago de lo indebido',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>113.08,
'cat_sat_nombre_cuenta'=>'Otros impuestos a favor',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>114.00,
'cat_sat_nombre_cuenta'=>'Pagos provisionales',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>114.01,
'cat_sat_nombre_cuenta'=>'Pagos provisionales de ISR',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>115.00,
'cat_sat_nombre_cuenta'=>'Inventario',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>115.01,
'cat_sat_nombre_cuenta'=>'Inventario',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>115.02,
'cat_sat_nombre_cuenta'=>'Materia prima y materiales',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>115.03,
'cat_sat_nombre_cuenta'=>'Producción en proceso',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>115.04,
'cat_sat_nombre_cuenta'=>'Productos terminados',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>115.05,
'cat_sat_nombre_cuenta'=>'Mercancías en tránsito',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>115.06,
'cat_sat_nombre_cuenta'=>'Mercancías en poder de terceros',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>115.07,
'cat_sat_nombre_cuenta'=>'Otros',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>116.00,
'cat_sat_nombre_cuenta'=>'Estimación de inventarios obsoletos y de lento movimiento',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>116.01,
'cat_sat_nombre_cuenta'=>'Estimación de inventarios obsoletos y de lento movimiento',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>117.00,
'cat_sat_nombre_cuenta'=>'Obras en proceso de inmuebles',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>117.01,
'cat_sat_nombre_cuenta'=>'Obras en proceso de inmuebles',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>118.00,
'cat_sat_nombre_cuenta'=>'Impuestos acreditables pagados',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>118.01,
'cat_sat_nombre_cuenta'=>'IVA acreditable pagado',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>118.02,
'cat_sat_nombre_cuenta'=>'IVA acreditable de importación pagado',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>118.03,
'cat_sat_nombre_cuenta'=>'IEPS acreditable pagado',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>118.04,
'cat_sat_nombre_cuenta'=>'IEPS pagado en importación',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>119.00,
'cat_sat_nombre_cuenta'=>'Impuestos acreditables por pagar',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>119.01,
'cat_sat_nombre_cuenta'=>'IVA pendiente de pago',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>119.02,
'cat_sat_nombre_cuenta'=>'IVA de importación pendiente de pago',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>119.03,
'cat_sat_nombre_cuenta'=>'IEPS pendiente de pago',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>119.04,
'cat_sat_nombre_cuenta'=>'IEPS pendiente de pago en importación',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>120.00,
'cat_sat_nombre_cuenta'=>'Anticipo a proveedores',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>120.01,
'cat_sat_nombre_cuenta'=>'Anticipo a proveedores nacional',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>120.02,
'cat_sat_nombre_cuenta'=>'Anticipo a proveedores extranjero',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>120.03,
'cat_sat_nombre_cuenta'=>'Anticipo a proveedores nacional parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>120.04,
'cat_sat_nombre_cuenta'=>'Anticipo a proveedores extranjero parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>121.00,
'cat_sat_nombre_cuenta'=>'Otros activos a corto plazo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>121.01,
'cat_sat_nombre_cuenta'=>'Otros activos a corto plazo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>151.00,
'cat_sat_nombre_cuenta'=>'Terrenos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>151.01,
'cat_sat_nombre_cuenta'=>'Terrenos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>152.00,
'cat_sat_nombre_cuenta'=>'Edificios',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>152.01,
'cat_sat_nombre_cuenta'=>'Edificios',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );

CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>153.00,
'cat_sat_nombre_cuenta'=>'Maquinaria y equipo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>153.01,
'cat_sat_nombre_cuenta'=>'Maquinaria y equipo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>154.00,
'cat_sat_nombre_cuenta'=>'Automóviles, autobuses, camiones de carga, tractocamiones, montacargas y remolques',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>154.01,
'cat_sat_nombre_cuenta'=>'Automóviles, autobuses, camiones de carga, tractocamiones, montacargas y remolques',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>155.00,
'cat_sat_nombre_cuenta'=>'Mobiliario y equipo de oficina',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>155.01,
'cat_sat_nombre_cuenta'=>'Mobiliario y equipo de oficina',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>156.00,
'cat_sat_nombre_cuenta'=>'Equipo de cómputo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>156.01,
'cat_sat_nombre_cuenta'=>'Equipo de cómputo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>157.00,
'cat_sat_nombre_cuenta'=>'Equipo de comunicación',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>157.01,
'cat_sat_nombre_cuenta'=>'Equipo de comunicación',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>158.00,
'cat_sat_nombre_cuenta'=>'Activos biológicos, vegetales y semovientes',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>158.01,
'cat_sat_nombre_cuenta'=>'Activos biológicos, vegetales y semovientes',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>159.00,
'cat_sat_nombre_cuenta'=>'Obras en proceso de activos fijos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>159.01,
'cat_sat_nombre_cuenta'=>'Obras en proceso de activos fijos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>160.00,
'cat_sat_nombre_cuenta'=>'Otros activos fijos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>160.01,
'cat_sat_nombre_cuenta'=>'Otros activos fijos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>161.00,
'cat_sat_nombre_cuenta'=>'Ferrocarriles',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>161.01,
'cat_sat_nombre_cuenta'=>'Ferrocarriles',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>162.00,
'cat_sat_nombre_cuenta'=>'Embarcaciones',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>162.01,
'cat_sat_nombre_cuenta'=>'Embarcaciones',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>163.00,
'cat_sat_nombre_cuenta'=>'Aviones',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>163.01,
'cat_sat_nombre_cuenta'=>'Aviones',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>164.00,
'cat_sat_nombre_cuenta'=>'Troqueles, moldes, matrices y herramental',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>164.01,
'cat_sat_nombre_cuenta'=>'Troqueles, moldes, matrices y herramental',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>165.00,
'cat_sat_nombre_cuenta'=>'Equipo de comunicaciones telefónicas',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>165.01,
'cat_sat_nombre_cuenta'=>'Equipo de comunicaciones telefónicas',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>166.00,
'cat_sat_nombre_cuenta'=>'Equipo de comunicación satelital',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>166.01,
'cat_sat_nombre_cuenta'=>'Equipo de comunicación satelital',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>167.00,
'cat_sat_nombre_cuenta'=>'Equipo de adaptaciones para personas con capacidades diferentes',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>167.01,
'cat_sat_nombre_cuenta'=>'Equipo de adaptaciones para personas con capacidades diferentes',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>168.00,
'cat_sat_nombre_cuenta'=>'Maquinaria y equipo de generación de energía de fuentes renovables o de sistemas de cogeneración d',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>168.01,
'cat_sat_nombre_cuenta'=>'Maquinaria y equipo de generación de energía de fuentes renovables o de sistemas de cogeneración d',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>169.00,
'cat_sat_nombre_cuenta'=>'Otra maquinaria y equipo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>169.01,
'cat_sat_nombre_cuenta'=>'Otra maquinaria y equipo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>170.00,
'cat_sat_nombre_cuenta'=>'Adaptaciones y mejoras',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>170.01,
'cat_sat_nombre_cuenta'=>'Adaptaciones y mejoras',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>171.00,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de activos fijos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.01,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de edificios',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.02,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de maquinaria y equipo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.03,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de automóviles, autobuses, camiones de carga, tractocamiones, montacargas y',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.04,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de mobiliario y equipo de oficina',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.05,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de equipo de cómputo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.06,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de equipo de comunicación',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.07,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de activos biológicos, vegetales y semovientes',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.08,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de otros activos fijos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.09,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de ferrocarriles',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.10,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de embarcaciones',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.11,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de aviones',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.12,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de troqueles, moldes, matrices y herramental',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.13,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de equipo de comunicaciones telefónicas',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.14,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de equipo de comunicación satelital',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.15,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de equipo de adaptaciones para personas con capacidades diferentes',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.16,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de maquinaria y equipo de generación de energía de fuentes renovables o de',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.17,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de adaptaciones y mejoras',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>171.18,
'cat_sat_nombre_cuenta'=>'Depreciación acumulada de otra maquinaria y equipo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>172.00,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de activos fijos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.01,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de edificios',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.02,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de maquinaria y equipo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.03,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de automóviles, autobuses, camiones de carga, tractocamiones, mont',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.04,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de mobiliario y equipo de oficina',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.05,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de equipo de cómputo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.06,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de equipo de comunicación',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.07,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de activos biológicos, vegetales y semovientes',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.08,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de otros activos fijos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.09,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de ferrocarriles',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.10,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de embarcaciones',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.11,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de aviones',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.12,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de troqueles, moldes, matrices y herramental',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.13,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de equipo de comunicaciones telefónicas',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.14,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de equipo de comunicación satelital',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.15,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de equipo de adaptaciones para personas con capacidades diferentes',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.16,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de maquinaria y equipo de generación de energía de fuentes renovab',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.17,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de adaptaciones y mejoras',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>172.18,
'cat_sat_nombre_cuenta'=>'Pérdida por deterioro acumulado de otra maquinaria y equipo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>173.00,
'cat_sat_nombre_cuenta'=>'Gastos diferidos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>173.01,
'cat_sat_nombre_cuenta'=>'Gastos diferidos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>174.00,
'cat_sat_nombre_cuenta'=>'Gastos pre operativos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>174.01,
'cat_sat_nombre_cuenta'=>'Gastos pre operativos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>175.00,
'cat_sat_nombre_cuenta'=>'Regalías, asistencia técnica y otros gastos diferidos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>175.01,
'cat_sat_nombre_cuenta'=>'Regalías, asistencia técnica y otros gastos diferidos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>176.00,
'cat_sat_nombre_cuenta'=>'Activos intangibles',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>176.01,
'cat_sat_nombre_cuenta'=>'Activos intangibles',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>177.00,
'cat_sat_nombre_cuenta'=>'Gastos de organización',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>177.01,
'cat_sat_nombre_cuenta'=>'Gastos de organización',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>178.00,
'cat_sat_nombre_cuenta'=>'Investigación y desarrollo de mercado',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>178.01,
'cat_sat_nombre_cuenta'=>'Investigación y desarrollo de mercado',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>179.00,
'cat_sat_nombre_cuenta'=>'Marcas y patentes',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>179.01,
'cat_sat_nombre_cuenta'=>'Marcas y patentes',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>180.00,
'cat_sat_nombre_cuenta'=>'Crédito mercantil',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>180.01,
'cat_sat_nombre_cuenta'=>'Crédito mercantil',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>181.00,
'cat_sat_nombre_cuenta'=>'Gastos de instalación',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>181.01,
'cat_sat_nombre_cuenta'=>'Gastos de instalación',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>182.00,
'cat_sat_nombre_cuenta'=>'Otros activos diferidos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>182.01,
'cat_sat_nombre_cuenta'=>'Otros activos diferidos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>183.00,
'cat_sat_nombre_cuenta'=>'Amortización acumulada de activos diferidos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>183.01,
'cat_sat_nombre_cuenta'=>'Amortización acumulada de gastos diferidos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>183.02,
'cat_sat_nombre_cuenta'=>'Amortización acumulada de gastos pre operativos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>183.03,
'cat_sat_nombre_cuenta'=>'Amortización acumulada de regalías, asistencia técnica y otros gastos diferidos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>183.04,
'cat_sat_nombre_cuenta'=>'Amortización acumulada de activos intangibles',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>183.05,
'cat_sat_nombre_cuenta'=>'Amortización acumulada de gastos de organización',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>183.06,
'cat_sat_nombre_cuenta'=>'Amortización acumulada de investigación y desarrollo de mercado',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>183.07,
'cat_sat_nombre_cuenta'=>'Amortización acumulada de marcas y patentes',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>183.08,
'cat_sat_nombre_cuenta'=>'Amortización acumulada de crédito mercantil',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>183.09,
'cat_sat_nombre_cuenta'=>'Amortización acumulada de gastos de instalación',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>183.10,
'cat_sat_nombre_cuenta'=>'Amortización acumulada de otros activos diferidos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>184.00,
'cat_sat_nombre_cuenta'=>'Depósitos en garantía',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>184.01,
'cat_sat_nombre_cuenta'=>'Depósitos de fianzas',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>184.02,
'cat_sat_nombre_cuenta'=>'Depósitos de arrendamiento de bienes inmuebles',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>184.03,
'cat_sat_nombre_cuenta'=>'Otros depósitos en garantía',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>185.00,
'cat_sat_nombre_cuenta'=>'Impuestos diferidos',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>185.01,
'cat_sat_nombre_cuenta'=>'Impuestos diferidos ISR',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>186.00,
'cat_sat_nombre_cuenta'=>'Cuentas y documentos por cobrar a largo plazo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>186.01,
'cat_sat_nombre_cuenta'=>'Cuentas y documentos por cobrar a largo plazo nacional',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>186.02,
'cat_sat_nombre_cuenta'=>'Cuentas y documentos por cobrar a largo plazo extranjero',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>186.03,
'cat_sat_nombre_cuenta'=>'Cuentas y documentos por cobrar a largo plazo nacional parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>186.04,
'cat_sat_nombre_cuenta'=>'Cuentas y documentos por cobrar a largo plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>186.05,
'cat_sat_nombre_cuenta'=>'Intereses por cobrar a largo plazo nacional',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>186.06,
'cat_sat_nombre_cuenta'=>'Intereses por cobrar a largo plazo extranjero',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>186.07,
'cat_sat_nombre_cuenta'=>'Intereses por cobrar a largo plazo nacional parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>186.08,
'cat_sat_nombre_cuenta'=>'Intereses por cobrar a largo plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>186.09,
'cat_sat_nombre_cuenta'=>'Otras Cuentas y documentos por cobrar a largo plazo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>186.10,
'cat_sat_nombre_cuenta'=>'Otras Cuentas y documentos por cobrar a largo plazo parte relacionada',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>187.00,
'cat_sat_nombre_cuenta'=>'Participación de los trabajadores en las utilidades diferidas',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>187.01,
'cat_sat_nombre_cuenta'=>'Participación de los trabajadores en las utilidades diferidas',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>188.00,
'cat_sat_nombre_cuenta'=>'Inversiones permanentes en acciones',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>188.01,
'cat_sat_nombre_cuenta'=>'Inversiones a largo plazo en subsidiarias',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>188.02,
'cat_sat_nombre_cuenta'=>'Inversiones a largo plazo en asociadas',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>188.03,
'cat_sat_nombre_cuenta'=>'Otras inversiones permanentes en acciones',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>189.00,
'cat_sat_nombre_cuenta'=>'Estimación por deterioro de inversiones permanentes en acciones',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>189.01,
'cat_sat_nombre_cuenta'=>'Estimación por deterioro de inversiones permanentes en acciones',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>190.00,
'cat_sat_nombre_cuenta'=>'Otros instrumentos financieros',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>190.01,
'cat_sat_nombre_cuenta'=>'Otros instrumentos financieros',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>191.00,
'cat_sat_nombre_cuenta'=>'Otros activos a largo plazo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>191.01,
'cat_sat_nombre_cuenta'=>'Otros activos a largo plazo',
'cat_sat_tipo'=>'Activo',
'cat_sat_subtipo'=>'Activo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>201.00,
'cat_sat_nombre_cuenta'=>'Proveedores',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>201.01,
'cat_sat_nombre_cuenta'=>'Proveedores nacionales',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>201.02,
'cat_sat_nombre_cuenta'=>'Proveedores extranjeros',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>201.03,
'cat_sat_nombre_cuenta'=>'Proveedores nacionales parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>201.04,
'cat_sat_nombre_cuenta'=>'Proveedores extranjeros parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>202.00,
'cat_sat_nombre_cuenta'=>'Cuentas por pagar a corto plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>202.01,
'cat_sat_nombre_cuenta'=>'Documentos por pagar bancario y financiero nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>202.02,
'cat_sat_nombre_cuenta'=>'Documentos por pagar bancario y financiero extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>202.03,
'cat_sat_nombre_cuenta'=>'Documentos y Cuentas por pagar a corto plazo nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>202.04,
'cat_sat_nombre_cuenta'=>'Documentos y Cuentas por pagar a corto plazo extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>202.05,
'cat_sat_nombre_cuenta'=>'Documentos y Cuentas por pagar a corto plazo nacional parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>202.06,
'cat_sat_nombre_cuenta'=>'Documentos y Cuentas por pagar a corto plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>202.07,
'cat_sat_nombre_cuenta'=>'Intereses por pagar a corto plazo nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>202.08,
'cat_sat_nombre_cuenta'=>'Intereses por pagar a corto plazo extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>202.09,
'cat_sat_nombre_cuenta'=>'Intereses por pagar a corto plazo nacional parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>202.10,
'cat_sat_nombre_cuenta'=>'Intereses por pagar a corto plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>202.11,
'cat_sat_nombre_cuenta'=>'Dividendo por pagar nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>202.12,
'cat_sat_nombre_cuenta'=>'Dividendo por pagar extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>203.00,
'cat_sat_nombre_cuenta'=>'Cobros anticipados a corto plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.01,
'cat_sat_nombre_cuenta'=>'Rentas cobradas por anticipado a corto plazo nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.02,
'cat_sat_nombre_cuenta'=>'Rentas cobradas por anticipado a corto plazo extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.03,
'cat_sat_nombre_cuenta'=>'Rentas cobradas por anticipado a corto plazo nacional parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.04,
'cat_sat_nombre_cuenta'=>'Rentas cobradas por anticipado a corto plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.05,
'cat_sat_nombre_cuenta'=>'Intereses cobrados por anticipado a corto plazo nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.06,
'cat_sat_nombre_cuenta'=>'Intereses cobrados por anticipado a corto plazo extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.07,
'cat_sat_nombre_cuenta'=>'Intereses cobrados por anticipado a corto plazo nacional parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.08,
'cat_sat_nombre_cuenta'=>'Intereses cobrados por anticipado a corto plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.09,
'cat_sat_nombre_cuenta'=>'Factoraje financiero cobrados por anticipado a corto plazo nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.10,
'cat_sat_nombre_cuenta'=>'Factoraje financiero cobrados por anticipado a corto plazo extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.11,
'cat_sat_nombre_cuenta'=>'Factoraje financiero cobrados por anticipado a corto plazo nacional parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.12,
'cat_sat_nombre_cuenta'=>'Factoraje financiero cobrados por anticipado a corto plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.13,
'cat_sat_nombre_cuenta'=>'Arrendamiento financiero cobrados por anticipado a corto plazo nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.14,
'cat_sat_nombre_cuenta'=>'Arrendamiento financiero cobrados por anticipado a corto plazo extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.15,
'cat_sat_nombre_cuenta'=>'Arrendamiento financiero cobrados por anticipado a corto plazo nacional parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.16,
'cat_sat_nombre_cuenta'=>'Arrendamiento financiero cobrados por anticipado a corto plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.17,
'cat_sat_nombre_cuenta'=>'Derechos fiduciarios',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>203.18,
'cat_sat_nombre_cuenta'=>'Otros cobros anticipados',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>204.00,
'cat_sat_nombre_cuenta'=>'Instrumentos financieros a corto plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>204.01,
'cat_sat_nombre_cuenta'=>'Instrumentos financieros a corto plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>205.00,
'cat_sat_nombre_cuenta'=>'Acreedores diversos a corto plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>205.01,
'cat_sat_nombre_cuenta'=>'Socios, accionistas o representante legal',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>205.02,
'cat_sat_nombre_cuenta'=>'Acreedores diversos a corto plazo nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>205.03,
'cat_sat_nombre_cuenta'=>'Acreedores diversos a corto plazo extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>205.04,
'cat_sat_nombre_cuenta'=>'Acreedores diversos a corto plazo nacional parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>205.05,
'cat_sat_nombre_cuenta'=>'Acreedores diversos a corto plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>205.06,
'cat_sat_nombre_cuenta'=>'Otros acreedores diversos a corto plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>206.00,
'cat_sat_nombre_cuenta'=>'Anticipo de cliente',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>206.01,
'cat_sat_nombre_cuenta'=>'Anticipo de cliente nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>206.02,
'cat_sat_nombre_cuenta'=>'Anticipo de cliente extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>206.03,
'cat_sat_nombre_cuenta'=>'Anticipo de cliente nacional parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>206.04,
'cat_sat_nombre_cuenta'=>'Anticipo de cliente extranjero parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>206.05,
'cat_sat_nombre_cuenta'=>'Otros anticipos de clientes',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>207.00,
'cat_sat_nombre_cuenta'=>'Impuestos trasladados',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>207.01,
'cat_sat_nombre_cuenta'=>'IVA trasladado',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>207.02,
'cat_sat_nombre_cuenta'=>'IEPS trasladado',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>208.00,
'cat_sat_nombre_cuenta'=>'Impuestos trasladados cobrados',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>208.01,
'cat_sat_nombre_cuenta'=>'IVA trasladado cobrado',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>208.02,
'cat_sat_nombre_cuenta'=>'IEPS trasladado cobrado',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>209.00,
'cat_sat_nombre_cuenta'=>'Impuestos trasladados no cobrados',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>209.01,
'cat_sat_nombre_cuenta'=>'IVA trasladado no cobrado',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>209.02,
'cat_sat_nombre_cuenta'=>'IEPS trasladado no cobrado',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>210.00,
'cat_sat_nombre_cuenta'=>'Provisión de sueldos y salarios por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>210.01,
'cat_sat_nombre_cuenta'=>'Provisión de sueldos y salarios por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>210.02,
'cat_sat_nombre_cuenta'=>'Provisión de vacaciones por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>210.03,
'cat_sat_nombre_cuenta'=>'Provisión de aguinaldo por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>210.04,
'cat_sat_nombre_cuenta'=>'Provisión de fondo de ahorro por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>210.05,
'cat_sat_nombre_cuenta'=>'Provisión de asimilados a salarios por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>210.06,
'cat_sat_nombre_cuenta'=>'Provisión de anticipos o remanentes por distribuir',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>210.07,
'cat_sat_nombre_cuenta'=>'Provisión de otros sueldos y salarios por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>211.00,
'cat_sat_nombre_cuenta'=>'Provisión de contribuciones de seguridad social por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>211.01,
'cat_sat_nombre_cuenta'=>'Provisión de IMSS patronal por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>211.02,
'cat_sat_nombre_cuenta'=>'Provisión de SAR por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>211.03,
'cat_sat_nombre_cuenta'=>'Provisión de infonavit por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>212.00,
'cat_sat_nombre_cuenta'=>'Provisión de impuesto estatal sobre nómina por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>212.01,
'cat_sat_nombre_cuenta'=>'Provisión de impuesto estatal sobre nómina por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>213.00,
'cat_sat_nombre_cuenta'=>'Impuestos y derechos por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>213.01,
'cat_sat_nombre_cuenta'=>'IVA por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>213.02,
'cat_sat_nombre_cuenta'=>'IEPS por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>213.03,
'cat_sat_nombre_cuenta'=>'ISR por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>213.04,
'cat_sat_nombre_cuenta'=>'Impuesto estatal sobre nómina por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>213.05,
'cat_sat_nombre_cuenta'=>'Impuesto estatal y municipal por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>213.06,
'cat_sat_nombre_cuenta'=>'Derechos por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>213.07,
'cat_sat_nombre_cuenta'=>'Otros impuestos por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>214.00,
'cat_sat_nombre_cuenta'=>'Dividendos por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>214.01,
'cat_sat_nombre_cuenta'=>'Dividendos por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>215.00,
'cat_sat_nombre_cuenta'=>'PTU por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>215.01,
'cat_sat_nombre_cuenta'=>'PTU por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>215.02,
'cat_sat_nombre_cuenta'=>'PTU por pagar de ejercicios anteriores',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>215.03,
'cat_sat_nombre_cuenta'=>'Provisión de PTU por pagar',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>216.00,
'cat_sat_nombre_cuenta'=>'Impuestos retenidos',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>216.01,
'cat_sat_nombre_cuenta'=>'Impuestos retenidos de ISR por sueldos y salarios',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>216.02,
'cat_sat_nombre_cuenta'=>'Impuestos retenidos de ISR por asimilados a salarios',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>216.03,
'cat_sat_nombre_cuenta'=>'Impuestos retenidos de ISR por arrendamiento',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>216.04,
'cat_sat_nombre_cuenta'=>'Impuestos retenidos de ISR por servicios profesionales',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>216.05,
'cat_sat_nombre_cuenta'=>'Impuestos retenidos de ISR por dividendos',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>216.06,
'cat_sat_nombre_cuenta'=>'Impuestos retenidos de ISR por intereses',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>216.07,
'cat_sat_nombre_cuenta'=>'Impuestos retenidos de ISR por pagos al extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>216.08,
'cat_sat_nombre_cuenta'=>'Impuestos retenidos de ISR por venta de acciones',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>216.09,
'cat_sat_nombre_cuenta'=>'Impuestos retenidos de ISR por venta de partes sociales',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>216.10,
'cat_sat_nombre_cuenta'=>'Impuestos retenidos de IVA',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>216.11,
'cat_sat_nombre_cuenta'=>'Retenciones de IMSS a los trabajadores',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>216.12,
'cat_sat_nombre_cuenta'=>'Otras impuestos retenidos',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>217.00,
'cat_sat_nombre_cuenta'=>'Pagos realizados por cuenta de terceros',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>217.01,
'cat_sat_nombre_cuenta'=>'Pagos realizados por cuenta de terceros',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>218.00,
'cat_sat_nombre_cuenta'=>'Otros pasivos a corto plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>218.01,
'cat_sat_nombre_cuenta'=>'Otros pasivos a corto plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a corto plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>251.00,
'cat_sat_nombre_cuenta'=>'Acreedores diversos a largo plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>251.01,
'cat_sat_nombre_cuenta'=>'Socios, accionistas o representante legal',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>251.02,
'cat_sat_nombre_cuenta'=>'Acreedores diversos a largo plazo nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>251.03,
'cat_sat_nombre_cuenta'=>'Acreedores diversos a largo plazo extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>251.04,
'cat_sat_nombre_cuenta'=>'Acreedores diversos a largo plazo nacional parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>251.05,
'cat_sat_nombre_cuenta'=>'Acreedores diversos a largo plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>251.06,
'cat_sat_nombre_cuenta'=>'Otros acreedores diversos a largo plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>252.00,
'cat_sat_nombre_cuenta'=>'Cuentas por pagar a largo plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>252.01,
'cat_sat_nombre_cuenta'=>'Documentos bancarios y financieros por pagar a largo plazo nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>252.02,
'cat_sat_nombre_cuenta'=>'Documentos bancarios y financieros por pagar a largo plazo extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>252.03,
'cat_sat_nombre_cuenta'=>'Documentos y Cuentas por pagar a largo plazo nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>252.04,
'cat_sat_nombre_cuenta'=>'Documentos y Cuentas por pagar a largo plazo extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>252.05,
'cat_sat_nombre_cuenta'=>'Documentos y Cuentas por pagar a largo plazo nacional parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>252.06,
'cat_sat_nombre_cuenta'=>'Documentos y Cuentas por pagar a largo plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>252.07,
'cat_sat_nombre_cuenta'=>'Hipotecas por pagar a largo plazo nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>252.08,
'cat_sat_nombre_cuenta'=>'Hipotecas por pagar a largo plazo extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>252.09,
'cat_sat_nombre_cuenta'=>'Hipotecas por pagar a largo plazo nacional parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>252.10,
'cat_sat_nombre_cuenta'=>'Hipotecas por pagar a largo plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>252.11,
'cat_sat_nombre_cuenta'=>'Intereses por pagar a largo plazo nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>252.12,
'cat_sat_nombre_cuenta'=>'Intereses por pagar a largo plazo extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>252.13,
'cat_sat_nombre_cuenta'=>'Intereses por pagar a largo plazo nacional parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>252.14,
'cat_sat_nombre_cuenta'=>'Intereses por pagar a largo plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>252.15,
'cat_sat_nombre_cuenta'=>'Dividendos por pagar nacionales',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>252.16,
'cat_sat_nombre_cuenta'=>'Dividendos por pagar extranjeros',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>252.17,
'cat_sat_nombre_cuenta'=>'Otras Cuentas y documentos por pagar a largo plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>253.00,
'cat_sat_nombre_cuenta'=>'Cobros anticipados a largo plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.01,
'cat_sat_nombre_cuenta'=>'Rentas cobradas por anticipado a largo plazo nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.02,
'cat_sat_nombre_cuenta'=>'Rentas cobradas por anticipado a largo plazo extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.03,
'cat_sat_nombre_cuenta'=>'Rentas cobradas por anticipado a largo plazo nacional parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.04,
'cat_sat_nombre_cuenta'=>'Rentas cobradas por anticipado a largo plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.05,
'cat_sat_nombre_cuenta'=>'Intereses cobrados por anticipado a largo plazo nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.06,
'cat_sat_nombre_cuenta'=>'Intereses cobrados por anticipado a largo plazo extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.07,
'cat_sat_nombre_cuenta'=>'Intereses cobrados por anticipado a largo plazo nacional parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.08,
'cat_sat_nombre_cuenta'=>'Intereses cobrados por anticipado a largo plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.09,
'cat_sat_nombre_cuenta'=>'Factoraje financiero cobrados por anticipado a largo plazo nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.10,
'cat_sat_nombre_cuenta'=>'Factoraje financiero cobrados por anticipado a largo plazo extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.11,
'cat_sat_nombre_cuenta'=>'Factoraje financiero cobrados por anticipado a largo plazo nacional parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.12,
'cat_sat_nombre_cuenta'=>'Factoraje financiero cobrados por anticipado a largo plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.13,
'cat_sat_nombre_cuenta'=>'Arrendamiento financiero cobrados por anticipado a largo plazo nacional',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.14,
'cat_sat_nombre_cuenta'=>'Arrendamiento financiero cobrados por anticipado a largo plazo extranjero',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.15,
'cat_sat_nombre_cuenta'=>'Arrendamiento financiero cobrados por anticipado a largo plazo nacional parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.16,
'cat_sat_nombre_cuenta'=>'Arrendamiento financiero cobrados por anticipado a largo plazo extranjero parte relacionada',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.17,
'cat_sat_nombre_cuenta'=>'Derechos fiduciarios',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>253.18,
'cat_sat_nombre_cuenta'=>'Otros cobros anticipados',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>254.00,
'cat_sat_nombre_cuenta'=>'Instrumentos financieros a largo plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>254.01,
'cat_sat_nombre_cuenta'=>'Instrumentos financieros a largo plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>255.00,
'cat_sat_nombre_cuenta'=>'Pasivos por beneficios a los empleados a largo plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>255.01,
'cat_sat_nombre_cuenta'=>'Pasivos por beneficios a los empleados a largo plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>256.00,
'cat_sat_nombre_cuenta'=>'Otros pasivos a largo plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>256.01,
'cat_sat_nombre_cuenta'=>'Otros pasivos a largo plazo',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>257.00,
'cat_sat_nombre_cuenta'=>'Participación de los trabajadores en las utilidades diferida',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>257.01,
'cat_sat_nombre_cuenta'=>'Participación de los trabajadores en las utilidades diferida',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>258.00,
'cat_sat_nombre_cuenta'=>'Obligaciones contraídas de fideicomisos',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>258.01,
'cat_sat_nombre_cuenta'=>'Obligaciones contraídas de fideicomisos',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>259.00,
'cat_sat_nombre_cuenta'=>'Impuestos diferidos',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>259.01,
'cat_sat_nombre_cuenta'=>'ISR diferido',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>259.02,
'cat_sat_nombre_cuenta'=>'ISR por dividendo diferido',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>259.03,
'cat_sat_nombre_cuenta'=>'Otros impuestos diferidos',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>260.00,
'cat_sat_nombre_cuenta'=>'Pasivos diferidos',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>260.01,
'cat_sat_nombre_cuenta'=>'Pasivos diferidos',
'cat_sat_tipo'=>'Pasivo',
'cat_sat_subtipo'=>'Pasivo a largo plazo'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>301.00,
'cat_sat_nombre_cuenta'=>'Capital social',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>301.01,
'cat_sat_nombre_cuenta'=>'Capital fijo',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>301.02,
'cat_sat_nombre_cuenta'=>'Capital variable',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>301.03,
'cat_sat_nombre_cuenta'=>'Aportaciones para futuros aumentos de capital',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>301.04,
'cat_sat_nombre_cuenta'=>'Prima en suscripción de acciones',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>301.05,
'cat_sat_nombre_cuenta'=>'Prima en suscripción de partes sociales',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>302.00,
'cat_sat_nombre_cuenta'=>'Patrimonio',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>302.01,
'cat_sat_nombre_cuenta'=>'Patrimonio',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>302.02,
'cat_sat_nombre_cuenta'=>'Aportación patrimonial',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>302.03,
'cat_sat_nombre_cuenta'=>'Déficit o remanente del ejercicio',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>303.00,
'cat_sat_nombre_cuenta'=>'Reserva legal',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>303.01,
'cat_sat_nombre_cuenta'=>'Reserva legal',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>304.00,
'cat_sat_nombre_cuenta'=>'Resultado de ejercicios anteriores',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>304.01,
'cat_sat_nombre_cuenta'=>'Utilidad de ejercicios anteriores',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>304.02,
'cat_sat_nombre_cuenta'=>'Pérdida de ejercicios anteriores',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>304.03,
'cat_sat_nombre_cuenta'=>'Resultado integral de ejercicios anteriores',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>304.04,
'cat_sat_nombre_cuenta'=>'Déficit o remanente de ejercicio anteriores',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>305.00,
'cat_sat_nombre_cuenta'=>'Resultado del ejercicio',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>305.01,
'cat_sat_nombre_cuenta'=>'Utilidad del ejercicio',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>305.02,
'cat_sat_nombre_cuenta'=>'Pérdida del ejercicio',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>305.03,
'cat_sat_nombre_cuenta'=>'Resultado integral',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>306.00,
'cat_sat_nombre_cuenta'=>'Otras Cuentas de capital',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>306.01,
'cat_sat_nombre_cuenta'=>'Otras Cuentas de capital',
'cat_sat_tipo'=>'Capital',
'cat_sat_subtipo'=>'Capital contable'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>401.00,
'cat_sat_nombre_cuenta'=>'Ingresos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.01,
'cat_sat_nombre_cuenta'=>'Ventas y/o servicios gravados a la tasa general',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.02,
'cat_sat_nombre_cuenta'=>'Ventas y/o servicios gravados a la tasa general de contado',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.03,
'cat_sat_nombre_cuenta'=>'Ventas y/o servicios gravados a la tasa general a crédito',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.04,
'cat_sat_nombre_cuenta'=>'Ventas y/o servicios gravados al 0%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.05,
'cat_sat_nombre_cuenta'=>'Ventas y/o servicios gravados al 0% de contado',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.06,
'cat_sat_nombre_cuenta'=>'Ventas y/o servicios gravados al 0% a crédito',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.07,
'cat_sat_nombre_cuenta'=>'Ventas y/o servicios exentos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.08,
'cat_sat_nombre_cuenta'=>'Ventas y/o servicios exentos de contado',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.09,
'cat_sat_nombre_cuenta'=>'Ventas y/o servicios exentos a crédito',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.10,
'cat_sat_nombre_cuenta'=>'Ventas y/o servicios gravados a la tasa general nacionales partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.11,
'cat_sat_nombre_cuenta'=>'Ventas y/o servicios gravados a la tasa general extranjeros partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.12,
'cat_sat_nombre_cuenta'=>'Ventas y/o servicios gravados al 0% nacionales partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.13,
'cat_sat_nombre_cuenta'=>'Ventas y/o servicios gravados al 0% extranjeros partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.14,
'cat_sat_nombre_cuenta'=>'Ventas y/o servicios exentos nacionales partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.15,
'cat_sat_nombre_cuenta'=>'Ventas y/o servicios exentos extranjeros partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.16,
'cat_sat_nombre_cuenta'=>'Ingresos por servicios administrativos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.17,
'cat_sat_nombre_cuenta'=>'Ingresos por servicios administrativos nacionales partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.18,
'cat_sat_nombre_cuenta'=>'Ingresos por servicios administrativos extranjeros partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.19,
'cat_sat_nombre_cuenta'=>'Ingresos por servicios profesionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.20,
'cat_sat_nombre_cuenta'=>'Ingresos por servicios profesionales nacionales partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.21,
'cat_sat_nombre_cuenta'=>'Ingresos por servicios profesionales extranjeros partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.22,
'cat_sat_nombre_cuenta'=>'Ingresos por arrendamiento',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.23,
'cat_sat_nombre_cuenta'=>'Ingresos por arrendamiento nacionales partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.24,
'cat_sat_nombre_cuenta'=>'Ingresos por arrendamiento extranjeros partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.25,
'cat_sat_nombre_cuenta'=>'Ingresos por exportación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.26,
'cat_sat_nombre_cuenta'=>'Ingresos por comisiones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.27,
'cat_sat_nombre_cuenta'=>'Ingresos por maquila',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.28,
'cat_sat_nombre_cuenta'=>'Ingresos por coordinados',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.29,
'cat_sat_nombre_cuenta'=>'Ingresos por regalías',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.30,
'cat_sat_nombre_cuenta'=>'Ingresos por asistencia técnica',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.31,
'cat_sat_nombre_cuenta'=>'Ingresos por donativos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.32,
'cat_sat_nombre_cuenta'=>'Ingresos por intereses (actividad propia)',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.33,
'cat_sat_nombre_cuenta'=>'Ingresos de copropiedad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.34,
'cat_sat_nombre_cuenta'=>'Ingresos por fideicomisos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.35,
'cat_sat_nombre_cuenta'=>'Ingresos por factoraje financiero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.36,
'cat_sat_nombre_cuenta'=>'Ingresos por arrendamiento financiero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.37,
'cat_sat_nombre_cuenta'=>'Ingresos de extranjeros con establecimiento en el país',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>401.38,
'cat_sat_nombre_cuenta'=>'Otros ingresos propios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>402.00,
'cat_sat_nombre_cuenta'=>'Devoluciones, descuentos o bonificaciones sobre ingresos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>402.01,
'cat_sat_nombre_cuenta'=>'Devoluciones, descuentos o bonificaciones sobre ventas y/o servicios a la tasa general',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>402.02,
'cat_sat_nombre_cuenta'=>'Devoluciones, descuentos o bonificaciones sobre ventas y/o servicios al 0%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>402.03,
'cat_sat_nombre_cuenta'=>'Devoluciones, descuentos o bonificaciones sobre ventas y/o servicios exentos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>402.04,
'cat_sat_nombre_cuenta'=>'Devoluciones, descuentos o bonificaciones de otros ingresos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>403.00,
'cat_sat_nombre_cuenta'=>'Otros ingresos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>403.01,
'cat_sat_nombre_cuenta'=>'Otros Ingresos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>403.02,
'cat_sat_nombre_cuenta'=>'Otros ingresos nacionales parte relacionada',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>403.03,
'cat_sat_nombre_cuenta'=>'Otros ingresos extranjeros parte relacionada',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>403.04,
'cat_sat_nombre_cuenta'=>'Ingresos por operaciones discontinuas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>403.05,
'cat_sat_nombre_cuenta'=>'Ingresos por condonación de adeudo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Ingresos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>501.00,
'cat_sat_nombre_cuenta'=>'Costo de venta y/o servicio',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>501.01,
'cat_sat_nombre_cuenta'=>'Costo de venta',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>501.02,
'cat_sat_nombre_cuenta'=>'Costo de servicios (Mano de obra)',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>501.03,
'cat_sat_nombre_cuenta'=>'Materia prima directa utilizada para la producción',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>501.04,
'cat_sat_nombre_cuenta'=>'Materia prima consumida en el proceso productivo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>501.05,
'cat_sat_nombre_cuenta'=>'Mano de obra directa consumida',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>501.06,
'cat_sat_nombre_cuenta'=>'Mano de obra directa',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>501.07,
'cat_sat_nombre_cuenta'=>'Cargos indirectos de producción',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>501.08,
'cat_sat_nombre_cuenta'=>'Otros conceptos de costo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>502.00,
'cat_sat_nombre_cuenta'=>'Compras',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>502.01,
'cat_sat_nombre_cuenta'=>'Compras nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>502.02,
'cat_sat_nombre_cuenta'=>'Compras nacionales parte relacionada',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>502.03,
'cat_sat_nombre_cuenta'=>'Compras de Importación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>502.04,
'cat_sat_nombre_cuenta'=>'Compras de Importación partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>503.00,
'cat_sat_nombre_cuenta'=>'Devoluciones, descuentos o bonificaciones sobre compras',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>503.01,
'cat_sat_nombre_cuenta'=>'Devoluciones, descuentos o bonificaciones sobre compras',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>504.00,
'cat_sat_nombre_cuenta'=>'Otras Cuentas de costos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.01,
'cat_sat_nombre_cuenta'=>'Gastos indirectos de fabricación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.02,
'cat_sat_nombre_cuenta'=>'Gastos indirectos de fabricación de partes relacionadas nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.03,
'cat_sat_nombre_cuenta'=>'Gastos indirectos de fabricación de partes relacionadas extranjeras',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.04,
'cat_sat_nombre_cuenta'=>'Otras Cuentas de costos incurridos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.05,
'cat_sat_nombre_cuenta'=>'Otras Cuentas de costos incurridos con partes relacionadas nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.06,
'cat_sat_nombre_cuenta'=>'Otras Cuentas de costos incurridos con partes relacionadas extranjeras',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.07,
'cat_sat_nombre_cuenta'=>'Depreciación de edificios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.08,
'cat_sat_nombre_cuenta'=>'Depreciación de maquinaria y equipo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.09,
'cat_sat_nombre_cuenta'=>'Depreciación de automóviles, autobuses, camiones de carga, tractocamiones, montacargas y remolques',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.10,
'cat_sat_nombre_cuenta'=>'Depreciación de mobiliario y equipo de oficina',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.11,
'cat_sat_nombre_cuenta'=>'Depreciación de equipo de cómputo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.12,
'cat_sat_nombre_cuenta'=>'Depreciación de equipo de comunicación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.13,
'cat_sat_nombre_cuenta'=>'Depreciación de activos biológicos, vegetales y semovientes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.14,
'cat_sat_nombre_cuenta'=>'Depreciación de otros activos fijos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.15,
'cat_sat_nombre_cuenta'=>'Depreciación de ferrocarriles',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.16,
'cat_sat_nombre_cuenta'=>'Depreciación de embarcaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.17,
'cat_sat_nombre_cuenta'=>'Depreciación de aviones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.18,
'cat_sat_nombre_cuenta'=>'Depreciación de troqueles, moldes, matrices y herramental',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.19,
'cat_sat_nombre_cuenta'=>'Depreciación de equipo de comunicaciones telefónicas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.20,
'cat_sat_nombre_cuenta'=>'Depreciación de equipo de comunicación satelital',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.21,
'cat_sat_nombre_cuenta'=>'Depreciación de equipo de adaptaciones para personas con capacidades diferentes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.22,
'cat_sat_nombre_cuenta'=>'Depreciación de maquinaria y equipo de generación de energía de fuentes renovables o de sistemas d',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.23,
'cat_sat_nombre_cuenta'=>'Depreciación de adaptaciones y mejoras',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.24,
'cat_sat_nombre_cuenta'=>'Depreciación de otra maquinaria y equipo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>504.25,
'cat_sat_nombre_cuenta'=>'Otras Cuentas de costos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>505.00,
'cat_sat_nombre_cuenta'=>'Costo de activo fijo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>505.01,
'cat_sat_nombre_cuenta'=>'Costo por venta de activo fijo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>505.01,
'cat_sat_nombre_cuenta'=>'Costo por baja de activo fijo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Costos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>601.00,
'cat_sat_nombre_cuenta'=>'Gastos generales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.01,
'cat_sat_nombre_cuenta'=>'Sueldos y salarios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.02,
'cat_sat_nombre_cuenta'=>'Compensaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.03,
'cat_sat_nombre_cuenta'=>'Tiempos extras',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.04,
'cat_sat_nombre_cuenta'=>'Premios de asistencia',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.05,
'cat_sat_nombre_cuenta'=>'Premios de puntualidad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.06,
'cat_sat_nombre_cuenta'=>'Vacaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.07,
'cat_sat_nombre_cuenta'=>'Prima vacacional',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.08,
'cat_sat_nombre_cuenta'=>'Prima dominical',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.09,
'cat_sat_nombre_cuenta'=>'Días festivos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.10,
'cat_sat_nombre_cuenta'=>'Gratificaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.11,
'cat_sat_nombre_cuenta'=>'Primas de antigüedad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.12,
'cat_sat_nombre_cuenta'=>'Aguinaldo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.13,
'cat_sat_nombre_cuenta'=>'Indemnizaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.14,
'cat_sat_nombre_cuenta'=>'Destajo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.15,
'cat_sat_nombre_cuenta'=>'Despensa',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.16,
'cat_sat_nombre_cuenta'=>'Transporte',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.17,
'cat_sat_nombre_cuenta'=>'Servicio médico',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.18,
'cat_sat_nombre_cuenta'=>'Ayuda en gastos funerarios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.19,
'cat_sat_nombre_cuenta'=>'Fondo de ahorro',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.20,
'cat_sat_nombre_cuenta'=>'Cuotas sindicales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.21,
'cat_sat_nombre_cuenta'=>'PTU',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.22,
'cat_sat_nombre_cuenta'=>'Estímulo al personal',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.23,
'cat_sat_nombre_cuenta'=>'Previsión social',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.24,
'cat_sat_nombre_cuenta'=>'Aportaciones para el plan de jubilación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.25,
'cat_sat_nombre_cuenta'=>'Otras prestaciones al personal',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.26,
'cat_sat_nombre_cuenta'=>'Cuotas al IMSS',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.27,
'cat_sat_nombre_cuenta'=>'Aportaciones al infonavit',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.28,
'cat_sat_nombre_cuenta'=>'Aportaciones al SAR',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.29,
'cat_sat_nombre_cuenta'=>'Impuesto estatal sobre nóminas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.30,
'cat_sat_nombre_cuenta'=>'Otras aportaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.31,
'cat_sat_nombre_cuenta'=>'Asimilados a salarios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.32,
'cat_sat_nombre_cuenta'=>'Servicios administrativos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.33,
'cat_sat_nombre_cuenta'=>'Servicios administrativos partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.34,
'cat_sat_nombre_cuenta'=>'Honorarios a personas físicas residentes nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.35,
'cat_sat_nombre_cuenta'=>'Honorarios a personas físicas residentes nacionales partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.36,
'cat_sat_nombre_cuenta'=>'Honorarios a personas físicas residentes del extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.37,
'cat_sat_nombre_cuenta'=>'Honorarios a personas físicas residentes del extranjero partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.38,
'cat_sat_nombre_cuenta'=>'Honorarios a personas morales residentes nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.39,
'cat_sat_nombre_cuenta'=>'Honorarios a personas morales residentes nacionales partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.40,
'cat_sat_nombre_cuenta'=>'Honorarios a personas morales residentes del extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.41,
'cat_sat_nombre_cuenta'=>'Honorarios a personas morales residentes del extranjero partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.42,
'cat_sat_nombre_cuenta'=>'Honorarios aduanales personas físicas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.43,
'cat_sat_nombre_cuenta'=>'Honorarios aduanales personas morales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.44,
'cat_sat_nombre_cuenta'=>'Honorarios al consejo de administración',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.45,
'cat_sat_nombre_cuenta'=>'Arrendamiento a personas físicas residentes nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.46,
'cat_sat_nombre_cuenta'=>'Arrendamiento a personas morales residentes nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.47,
'cat_sat_nombre_cuenta'=>'Arrendamiento a residentes del extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.48,
'cat_sat_nombre_cuenta'=>'Combustibles y lubricantes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.49,
'cat_sat_nombre_cuenta'=>'Viáticos y gastos de viaje',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.50,
'cat_sat_nombre_cuenta'=>'Teléfono, internet',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.51,
'cat_sat_nombre_cuenta'=>'Agua',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.52,
'cat_sat_nombre_cuenta'=>'Energía eléctrica',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.53,
'cat_sat_nombre_cuenta'=>'Vigilancia y seguridad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.54,
'cat_sat_nombre_cuenta'=>'Limpieza',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.55,
'cat_sat_nombre_cuenta'=>'Papelería y artículos de oficina',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.56,
'cat_sat_nombre_cuenta'=>'Mantenimiento y conservación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.57,
'cat_sat_nombre_cuenta'=>'Seguros y fianzas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.58,
'cat_sat_nombre_cuenta'=>'Otros impuestos y derechos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.59,
'cat_sat_nombre_cuenta'=>'Recargos fiscales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.60,
'cat_sat_nombre_cuenta'=>'Cuotas y suscripciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.61,
'cat_sat_nombre_cuenta'=>'Propaganda y publicidad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.62,
'cat_sat_nombre_cuenta'=>'Capacitación al personal',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.63,
'cat_sat_nombre_cuenta'=>'Donativos y ayudas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.64,
'cat_sat_nombre_cuenta'=>'Asistencia técnica',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.65,
'cat_sat_nombre_cuenta'=>'Regalías sujetas a otros porcentajes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.66,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 5%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.67,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 10%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.68,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 15%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.69,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 25%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.70,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 30%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.71,
'cat_sat_nombre_cuenta'=>'Regalías sin retención',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.72,
'cat_sat_nombre_cuenta'=>'Fletes y acarreos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.73,
'cat_sat_nombre_cuenta'=>'Gastos de importación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.74,
'cat_sat_nombre_cuenta'=>'Comisiones sobre ventas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.75,
'cat_sat_nombre_cuenta'=>'Comisiones por tarjetas de crédito',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.76,
'cat_sat_nombre_cuenta'=>'Patentes y marcas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.77,
'cat_sat_nombre_cuenta'=>'Uniformes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.78,
'cat_sat_nombre_cuenta'=>'Prediales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.79,
'cat_sat_nombre_cuenta'=>'Gastos generales de urbanización',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.80,
'cat_sat_nombre_cuenta'=>'Gastos generales de construcción',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.81,
'cat_sat_nombre_cuenta'=>'Fletes del extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.82,
'cat_sat_nombre_cuenta'=>'Recolección de bienes del sector agropecuario y/o ganadero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.83,
'cat_sat_nombre_cuenta'=>'Gastos no deducibles (sin requisitos fiscales)',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>601.84,
'cat_sat_nombre_cuenta'=>'Otros gastos generales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>602.00,
'cat_sat_nombre_cuenta'=>'Gastos de venta',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.01,
'cat_sat_nombre_cuenta'=>'Sueldos y salarios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.02,
'cat_sat_nombre_cuenta'=>'Compensaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.03,
'cat_sat_nombre_cuenta'=>'Tiempos extras',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.04,
'cat_sat_nombre_cuenta'=>'Premios de asistencia',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.05,
'cat_sat_nombre_cuenta'=>'Premios de puntualidad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.06,
'cat_sat_nombre_cuenta'=>'Vacaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.07,
'cat_sat_nombre_cuenta'=>'Prima vacacional',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.08,
'cat_sat_nombre_cuenta'=>'Prima dominical',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.09,
'cat_sat_nombre_cuenta'=>'Días festivos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.10,
'cat_sat_nombre_cuenta'=>'Gratificaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.11,
'cat_sat_nombre_cuenta'=>'Primas de antigüedad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.12,
'cat_sat_nombre_cuenta'=>'Aguinaldo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.13,
'cat_sat_nombre_cuenta'=>'Indemnizaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.14,
'cat_sat_nombre_cuenta'=>'Destajo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.15,
'cat_sat_nombre_cuenta'=>'Despensa',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.16,
'cat_sat_nombre_cuenta'=>'Transporte',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.17,
'cat_sat_nombre_cuenta'=>'Servicio médico',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.18,
'cat_sat_nombre_cuenta'=>'Ayuda en gastos funerarios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.19,
'cat_sat_nombre_cuenta'=>'Fondo de ahorro',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.20,
'cat_sat_nombre_cuenta'=>'Cuotas sindicales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.21,
'cat_sat_nombre_cuenta'=>'PTU',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.22,
'cat_sat_nombre_cuenta'=>'Estímulo al personal',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.23,
'cat_sat_nombre_cuenta'=>'Previsión social',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.24,
'cat_sat_nombre_cuenta'=>'Aportaciones para el plan de jubilación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.25,
'cat_sat_nombre_cuenta'=>'Otras prestaciones al personal',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.26,
'cat_sat_nombre_cuenta'=>'Cuotas al IMSS',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.27,
'cat_sat_nombre_cuenta'=>'Aportaciones al infonavit',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.28,
'cat_sat_nombre_cuenta'=>'Aportaciones al SAR',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.29,
'cat_sat_nombre_cuenta'=>'Impuesto estatal sobre nóminas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.30,
'cat_sat_nombre_cuenta'=>'Otras aportaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.31,
'cat_sat_nombre_cuenta'=>'Asimilados a salarios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.32,
'cat_sat_nombre_cuenta'=>'Servicios administrativos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.33,
'cat_sat_nombre_cuenta'=>'Servicios administrativos partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.34,
'cat_sat_nombre_cuenta'=>'Honorarios a personas físicas residentes nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.35,
'cat_sat_nombre_cuenta'=>'Honorarios a personas físicas residentes nacionales partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.36,
'cat_sat_nombre_cuenta'=>'Honorarios a personas físicas residentes del extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.37,
'cat_sat_nombre_cuenta'=>'Honorarios a personas físicas residentes del extranjero partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.38,
'cat_sat_nombre_cuenta'=>'Honorarios a personas morales residentes nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.39,
'cat_sat_nombre_cuenta'=>'Honorarios a personas morales residentes nacionales partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.40,
'cat_sat_nombre_cuenta'=>'Honorarios a personas morales residentes del extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.41,
'cat_sat_nombre_cuenta'=>'Honorarios a personas morales residentes del extranjero partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.42,
'cat_sat_nombre_cuenta'=>'Honorarios aduanales personas físicas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.43,
'cat_sat_nombre_cuenta'=>'Honorarios aduanales personas morales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.44,
'cat_sat_nombre_cuenta'=>'Honorarios al consejo de administración',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.45,
'cat_sat_nombre_cuenta'=>'Arrendamiento a personas físicas residentes nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.46,
'cat_sat_nombre_cuenta'=>'Arrendamiento a personas morales residentes nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.47,
'cat_sat_nombre_cuenta'=>'Arrendamiento a residentes del extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.48,
'cat_sat_nombre_cuenta'=>'Combustibles y lubricantes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.49,
'cat_sat_nombre_cuenta'=>'Viáticos y gastos de viaje',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.50,
'cat_sat_nombre_cuenta'=>'Teléfono, internet',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.51,
'cat_sat_nombre_cuenta'=>'Agua',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.52,
'cat_sat_nombre_cuenta'=>'Energía eléctrica',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.53,
'cat_sat_nombre_cuenta'=>'Vigilancia y seguridad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.54,
'cat_sat_nombre_cuenta'=>'Limpieza',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.55,
'cat_sat_nombre_cuenta'=>'Papelería y artículos de oficina',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.56,
'cat_sat_nombre_cuenta'=>'Mantenimiento y conservación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.57,
'cat_sat_nombre_cuenta'=>'Seguros y fianzas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.58,
'cat_sat_nombre_cuenta'=>'Otros impuestos y derechos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.59,
'cat_sat_nombre_cuenta'=>'Recargos fiscales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.60,
'cat_sat_nombre_cuenta'=>'Cuotas y suscripciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.61,
'cat_sat_nombre_cuenta'=>'Propaganda y publicidad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.62,
'cat_sat_nombre_cuenta'=>'Capacitación al personal',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.63,
'cat_sat_nombre_cuenta'=>'Donativos y ayudas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.64,
'cat_sat_nombre_cuenta'=>'Asistencia técnica',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.65,
'cat_sat_nombre_cuenta'=>'Regalías sujetas a otros porcentajes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.66,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 5%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.67,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 10%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.68,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 15%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.69,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 25%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.70,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 30%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.71,
'cat_sat_nombre_cuenta'=>'Regalías sin retención',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.72,
'cat_sat_nombre_cuenta'=>'Fletes y acarreos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.73,
'cat_sat_nombre_cuenta'=>'Gastos de importación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.74,
'cat_sat_nombre_cuenta'=>'Comisiones sobre ventas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.75,
'cat_sat_nombre_cuenta'=>'Comisiones por tarjetas de crédito',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.76,
'cat_sat_nombre_cuenta'=>'Patentes y marcas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.77,
'cat_sat_nombre_cuenta'=>'Uniformes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.78,
'cat_sat_nombre_cuenta'=>'Prediales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.79,
'cat_sat_nombre_cuenta'=>'Gastos de venta de urbanización',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.80,
'cat_sat_nombre_cuenta'=>'Gastos de venta de construcción',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.81,
'cat_sat_nombre_cuenta'=>'Fletes del extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.82,
'cat_sat_nombre_cuenta'=>'Recolección de bienes del sector agropecuario y/o ganadero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.83,
'cat_sat_nombre_cuenta'=>'Gastos no deducibles (sin requisitos fiscales)',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>602.84,
'cat_sat_nombre_cuenta'=>'Otros gastos de venta',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>603.00,
'cat_sat_nombre_cuenta'=>'Gastos de administración',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.01,
'cat_sat_nombre_cuenta'=>'Sueldos y salarios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.02,
'cat_sat_nombre_cuenta'=>'Compensaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.03,
'cat_sat_nombre_cuenta'=>'Tiempos extras',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.04,
'cat_sat_nombre_cuenta'=>'Premios de asistencia',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.05,
'cat_sat_nombre_cuenta'=>'Premios de puntualidad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.06,
'cat_sat_nombre_cuenta'=>'Vacaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.07,
'cat_sat_nombre_cuenta'=>'Prima vacacional',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.08,
'cat_sat_nombre_cuenta'=>'Prima dominical',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.09,
'cat_sat_nombre_cuenta'=>'Días festivos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.10,
'cat_sat_nombre_cuenta'=>'Gratificaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.11,
'cat_sat_nombre_cuenta'=>'Primas de antigüedad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.12,
'cat_sat_nombre_cuenta'=>'Aguinaldo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.13,
'cat_sat_nombre_cuenta'=>'Indemnizaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.14,
'cat_sat_nombre_cuenta'=>'Destajo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.15,
'cat_sat_nombre_cuenta'=>'Despensa',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.16,
'cat_sat_nombre_cuenta'=>'Transporte',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.17,
'cat_sat_nombre_cuenta'=>'Servicio médico',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.18,
'cat_sat_nombre_cuenta'=>'Ayuda en gastos funerarios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.19,
'cat_sat_nombre_cuenta'=>'Fondo de ahorro',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.20,
'cat_sat_nombre_cuenta'=>'Cuotas sindicales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.21,
'cat_sat_nombre_cuenta'=>'PTU',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.22,
'cat_sat_nombre_cuenta'=>'Estímulo al personal',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.23,
'cat_sat_nombre_cuenta'=>'Previsión social',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.24,
'cat_sat_nombre_cuenta'=>'Aportaciones para el plan de jubilación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.25,
'cat_sat_nombre_cuenta'=>'Otras prestaciones al personal',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.26,
'cat_sat_nombre_cuenta'=>'Cuotas al IMSS',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.27,
'cat_sat_nombre_cuenta'=>'Aportaciones al infonavit',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.28,
'cat_sat_nombre_cuenta'=>'Aportaciones al SAR',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.29,
'cat_sat_nombre_cuenta'=>'Impuesto estatal sobre nóminas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.30,
'cat_sat_nombre_cuenta'=>'Otras aportaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.31,
'cat_sat_nombre_cuenta'=>'Asimilados a salarios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.32,
'cat_sat_nombre_cuenta'=>'Servicios administrativos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.33,
'cat_sat_nombre_cuenta'=>'Servicios administrativos partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.34,
'cat_sat_nombre_cuenta'=>'Honorarios a personas físicas residentes nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.35,
'cat_sat_nombre_cuenta'=>'Honorarios a personas físicas residentes nacionales partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.36,
'cat_sat_nombre_cuenta'=>'Honorarios a personas físicas residentes del extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.37,
'cat_sat_nombre_cuenta'=>'Honorarios a personas físicas residentes del extranjero partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.38,
'cat_sat_nombre_cuenta'=>'Honorarios a personas morales residentes nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.39,
'cat_sat_nombre_cuenta'=>'Honorarios a personas morales residentes nacionales partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.40,
'cat_sat_nombre_cuenta'=>'Honorarios a personas morales residentes del extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.41,
'cat_sat_nombre_cuenta'=>'Honorarios a personas morales residentes del extranjero partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.42,
'cat_sat_nombre_cuenta'=>'Honorarios aduanales personas físicas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.43,
'cat_sat_nombre_cuenta'=>'Honorarios aduanales personas morales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.44,
'cat_sat_nombre_cuenta'=>'Honorarios al consejo de administración',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.45,
'cat_sat_nombre_cuenta'=>'Arrendamiento a personas físicas residentes nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.46,
'cat_sat_nombre_cuenta'=>'Arrendamiento a personas morales residentes nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.47,
'cat_sat_nombre_cuenta'=>'Arrendamiento a residentes del extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.48,
'cat_sat_nombre_cuenta'=>'Combustibles y lubricantes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.49,
'cat_sat_nombre_cuenta'=>'Viáticos y gastos de viaje',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.50,
'cat_sat_nombre_cuenta'=>'Teléfono, internet',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.51,
'cat_sat_nombre_cuenta'=>'Agua',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.52,
'cat_sat_nombre_cuenta'=>'Energía eléctrica',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.53,
'cat_sat_nombre_cuenta'=>'Vigilancia y seguridad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.54,
'cat_sat_nombre_cuenta'=>'Limpieza',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.55,
'cat_sat_nombre_cuenta'=>'Papelería y artículos de oficina',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.56,
'cat_sat_nombre_cuenta'=>'Mantenimiento y conservación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.57,
'cat_sat_nombre_cuenta'=>'Seguros y fianzas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.58,
'cat_sat_nombre_cuenta'=>'Otros impuestos y derechos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.59,
'cat_sat_nombre_cuenta'=>'Recargos fiscales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.60,
'cat_sat_nombre_cuenta'=>'Cuotas y suscripciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.61,
'cat_sat_nombre_cuenta'=>'Propaganda y publicidad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.62,
'cat_sat_nombre_cuenta'=>'Capacitación al personal',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.63,
'cat_sat_nombre_cuenta'=>'Donativos y ayudas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.64,
'cat_sat_nombre_cuenta'=>'Asistencia técnica',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.65,
'cat_sat_nombre_cuenta'=>'Regalías sujetas a otros porcentajes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.66,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 5%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.67,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 10%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.68,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 15%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.69,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 25%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.70,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 30%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.71,
'cat_sat_nombre_cuenta'=>'Regalías sin retención',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.72,
'cat_sat_nombre_cuenta'=>'Fletes y acarreos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.73,
'cat_sat_nombre_cuenta'=>'Gastos de importación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.74,
'cat_sat_nombre_cuenta'=>'Patentes y marcas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.75,
'cat_sat_nombre_cuenta'=>'Uniformes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.76,
'cat_sat_nombre_cuenta'=>'Prediales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.77,
'cat_sat_nombre_cuenta'=>'Gastos de administración de urbanización',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.78,
'cat_sat_nombre_cuenta'=>'Gastos de administración de construcción',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.79,
'cat_sat_nombre_cuenta'=>'Fletes del extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.80,
'cat_sat_nombre_cuenta'=>'Recolección de bienes del sector agropecuario y/o ganadero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.81,
'cat_sat_nombre_cuenta'=>'Gastos no deducibles (sin requisitos fiscales)',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>603.82,
'cat_sat_nombre_cuenta'=>'Otros gastos de administración',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>604.00,
'cat_sat_nombre_cuenta'=>'Gastos de fabricación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.01,
'cat_sat_nombre_cuenta'=>'Sueldos y salarios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.02,
'cat_sat_nombre_cuenta'=>'Compensaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.03,
'cat_sat_nombre_cuenta'=>'Tiempos extras',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.04,
'cat_sat_nombre_cuenta'=>'Premios de asistencia',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.05,
'cat_sat_nombre_cuenta'=>'Premios de puntualidad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.06,
'cat_sat_nombre_cuenta'=>'Vacaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.07,
'cat_sat_nombre_cuenta'=>'Prima vacacional',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.08,
'cat_sat_nombre_cuenta'=>'Prima dominical',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.09,
'cat_sat_nombre_cuenta'=>'Días festivos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.10,
'cat_sat_nombre_cuenta'=>'Gratificaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.11,
'cat_sat_nombre_cuenta'=>'Primas de antigüedad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.12,
'cat_sat_nombre_cuenta'=>'Aguinaldo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.13,
'cat_sat_nombre_cuenta'=>'Indemnizaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.14,
'cat_sat_nombre_cuenta'=>'Destajo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.15,
'cat_sat_nombre_cuenta'=>'Despensa',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.16,
'cat_sat_nombre_cuenta'=>'Transporte',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.17,
'cat_sat_nombre_cuenta'=>'Servicio médico',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.18,
'cat_sat_nombre_cuenta'=>'Ayuda en gastos funerarios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.19,
'cat_sat_nombre_cuenta'=>'Fondo de ahorro',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.20,
'cat_sat_nombre_cuenta'=>'Cuotas sindicales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.21,
'cat_sat_nombre_cuenta'=>'PTU',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.22,
'cat_sat_nombre_cuenta'=>'Estímulo al personal',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.23,
'cat_sat_nombre_cuenta'=>'Previsión social',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.24,
'cat_sat_nombre_cuenta'=>'Aportaciones para el plan de jubilación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.25,
'cat_sat_nombre_cuenta'=>'Otras prestaciones al personal',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.26,
'cat_sat_nombre_cuenta'=>'Cuotas al IMSS',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.27,
'cat_sat_nombre_cuenta'=>'Aportaciones al infonavit',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.28,
'cat_sat_nombre_cuenta'=>'Aportaciones al SAR',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.29,
'cat_sat_nombre_cuenta'=>'Impuesto estatal sobre nóminas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.30,
'cat_sat_nombre_cuenta'=>'Otras aportaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.31,
'cat_sat_nombre_cuenta'=>'Asimilados a salarios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.32,
'cat_sat_nombre_cuenta'=>'Servicios administrativos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.33,
'cat_sat_nombre_cuenta'=>'Servicios administrativos partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.34,
'cat_sat_nombre_cuenta'=>'Honorarios a personas físicas residentes nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.35,
'cat_sat_nombre_cuenta'=>'Honorarios a personas físicas residentes nacionales partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.36,
'cat_sat_nombre_cuenta'=>'Honorarios a personas físicas residentes del extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.37,
'cat_sat_nombre_cuenta'=>'Honorarios a personas físicas residentes del extranjero partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.38,
'cat_sat_nombre_cuenta'=>'Honorarios a personas morales residentes nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.39,
'cat_sat_nombre_cuenta'=>'Honorarios a personas morales residentes nacionales partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.40,
'cat_sat_nombre_cuenta'=>'Honorarios a personas morales residentes del extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.41,
'cat_sat_nombre_cuenta'=>'Honorarios a personas morales residentes del extranjero partes relacionadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.42,
'cat_sat_nombre_cuenta'=>'Honorarios aduanales personas físicas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.43,
'cat_sat_nombre_cuenta'=>'Honorarios aduanales personas morales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.44,
'cat_sat_nombre_cuenta'=>'Honorarios al consejo de administración',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.45,
'cat_sat_nombre_cuenta'=>'Arrendamiento a personas físicas residentes nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.46,
'cat_sat_nombre_cuenta'=>'Arrendamiento a personas morales residentes nacionales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.47,
'cat_sat_nombre_cuenta'=>'Arrendamiento a residentes del extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.48,
'cat_sat_nombre_cuenta'=>'Combustibles y lubricantes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.49,
'cat_sat_nombre_cuenta'=>'Viáticos y gastos de viaje',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.50,
'cat_sat_nombre_cuenta'=>'Teléfono, internet',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.51,
'cat_sat_nombre_cuenta'=>'Agua',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.52,
'cat_sat_nombre_cuenta'=>'Energía eléctrica',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.53,
'cat_sat_nombre_cuenta'=>'Vigilancia y seguridad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.54,
'cat_sat_nombre_cuenta'=>'Limpieza',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.55,
'cat_sat_nombre_cuenta'=>'Papelería y artículos de oficina',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.56,
'cat_sat_nombre_cuenta'=>'Mantenimiento y conservación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.57,
'cat_sat_nombre_cuenta'=>'Seguros y fianzas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.58,
'cat_sat_nombre_cuenta'=>'Otros impuestos y derechos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.59,
'cat_sat_nombre_cuenta'=>'Recargos fiscales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.60,
'cat_sat_nombre_cuenta'=>'Cuotas y suscripciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.61,
'cat_sat_nombre_cuenta'=>'Propaganda y publicidad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.62,
'cat_sat_nombre_cuenta'=>'Capacitación al personal',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.63,
'cat_sat_nombre_cuenta'=>'Donativos y ayudas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.64,
'cat_sat_nombre_cuenta'=>'Asistencia técnica',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.65,
'cat_sat_nombre_cuenta'=>'Regalías sujetas a otros porcentajes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.66,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 5%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.67,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 10%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.68,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 15%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.69,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 25%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.70,
'cat_sat_nombre_cuenta'=>'Regalías sujetas al 30%',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.71,
'cat_sat_nombre_cuenta'=>'Regalías sin retención',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.72,
'cat_sat_nombre_cuenta'=>'Fletes y acarreos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.73,
'cat_sat_nombre_cuenta'=>'Gastos de importación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.74,
'cat_sat_nombre_cuenta'=>'Patentes y marcas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.75,
'cat_sat_nombre_cuenta'=>'Uniformes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.76,
'cat_sat_nombre_cuenta'=>'Prediales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.77,
'cat_sat_nombre_cuenta'=>'Gastos de fabricación de urbanización',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.78,
'cat_sat_nombre_cuenta'=>'Gastos de fabricación de construcción',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.79,
'cat_sat_nombre_cuenta'=>'Fletes del extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.80,
'cat_sat_nombre_cuenta'=>'Recolección de bienes del sector agropecuario y/o ganadero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.81,
'cat_sat_nombre_cuenta'=>'Gastos no deducibles (sin requisitos fiscales)',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>604.82,
'cat_sat_nombre_cuenta'=>'Otros gastos de fabricación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>605.00,
'cat_sat_nombre_cuenta'=>'Mano de obra directa',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.01,
'cat_sat_nombre_cuenta'=>'Mano de obra',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.02,
'cat_sat_nombre_cuenta'=>'Sueldos y Salarios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.03,
'cat_sat_nombre_cuenta'=>'Compensaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.04,
'cat_sat_nombre_cuenta'=>'Tiempos extras',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.05,
'cat_sat_nombre_cuenta'=>'Premios de asistencia',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.06,
'cat_sat_nombre_cuenta'=>'Premios de puntualidad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.07,
'cat_sat_nombre_cuenta'=>'Vacaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.08,
'cat_sat_nombre_cuenta'=>'Prima vacacional',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.09,
'cat_sat_nombre_cuenta'=>'Prima dominical',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.10,
'cat_sat_nombre_cuenta'=>'Días festivos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.11,
'cat_sat_nombre_cuenta'=>'Gratificaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.12,
'cat_sat_nombre_cuenta'=>'Primas de antigüedad',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.13,
'cat_sat_nombre_cuenta'=>'Aguinaldo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.14,
'cat_sat_nombre_cuenta'=>'Indemnizaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.15,
'cat_sat_nombre_cuenta'=>'Destajo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.16,
'cat_sat_nombre_cuenta'=>'Despensa',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.17,
'cat_sat_nombre_cuenta'=>'Transporte',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.18,
'cat_sat_nombre_cuenta'=>'Servicio médico',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.19,
'cat_sat_nombre_cuenta'=>'Ayuda en gastos funerarios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.20,
'cat_sat_nombre_cuenta'=>'Fondo de ahorro',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.21,
'cat_sat_nombre_cuenta'=>'Cuotas sindicales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.22,
'cat_sat_nombre_cuenta'=>'PTU',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.23,
'cat_sat_nombre_cuenta'=>'Estímulo al personal',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.24,
'cat_sat_nombre_cuenta'=>'Previsión social',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.25,
'cat_sat_nombre_cuenta'=>'Aportaciones para el plan de jubilación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.26,
'cat_sat_nombre_cuenta'=>'Otras prestaciones al personal',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.27,
'cat_sat_nombre_cuenta'=>'Asimilados a salarios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.28,
'cat_sat_nombre_cuenta'=>'Cuotas al IMSS',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.29,
'cat_sat_nombre_cuenta'=>'Aportaciones al infonavit',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.30,
'cat_sat_nombre_cuenta'=>'Aportaciones al SAR',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>605.31,
'cat_sat_nombre_cuenta'=>'Otros costos de mano de obra directa',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>606.00,
'cat_sat_nombre_cuenta'=>'Facilidades administrativas fiscales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>606.01,
'cat_sat_nombre_cuenta'=>'Facilidades administrativas fiscales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>607.00,
'cat_sat_nombre_cuenta'=>'Participación de los trabajadores en las utilidades',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>607.01,
'cat_sat_nombre_cuenta'=>'Participación de los trabajadores en las utilidades',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>608.00,
'cat_sat_nombre_cuenta'=>'Participación en resultados de subsidiarias',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>608.01,
'cat_sat_nombre_cuenta'=>'Participación en resultados de subsidiarias',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>609.00,
'cat_sat_nombre_cuenta'=>'Participación en resultados de asociadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>609.01,
'cat_sat_nombre_cuenta'=>'Participación en resultados de asociadas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>610.00,
'cat_sat_nombre_cuenta'=>'Participación de los trabajadores en las utilidades diferida',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>610.01,
'cat_sat_nombre_cuenta'=>'Participación de los trabajadores en las utilidades diferida',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>611.00,
'cat_sat_nombre_cuenta'=>'Impuesto Sobre la renta',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>611.01,
'cat_sat_nombre_cuenta'=>'Impuesto Sobre la renta',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>611.02,
'cat_sat_nombre_cuenta'=>'Impuesto Sobre la renta por remanente distribuible',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>612.00,
'cat_sat_nombre_cuenta'=>'Gastos no deducibles para CUFIN',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>612.01,
'cat_sat_nombre_cuenta'=>'Gastos no deducibles para CUFIN',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>613.00,
'cat_sat_nombre_cuenta'=>'Depreciación contable',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.01,
'cat_sat_nombre_cuenta'=>'Depreciación de edificios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.02,
'cat_sat_nombre_cuenta'=>'Depreciación de maquinaria y equipo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.03,
'cat_sat_nombre_cuenta'=>'Depreciación de automóviles, autobuses, camiones de carga, tractocamiones, montacargas y remolques',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.04,
'cat_sat_nombre_cuenta'=>'Depreciación de mobiliario y equipo de oficina',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.05,
'cat_sat_nombre_cuenta'=>'Depreciación de equipo de cómputo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.06,
'cat_sat_nombre_cuenta'=>'Depreciación de equipo de comunicación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.07,
'cat_sat_nombre_cuenta'=>'Depreciación de activos biológicos, vegetales y semovientes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.08,
'cat_sat_nombre_cuenta'=>'Depreciación de otros activos fijos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.09,
'cat_sat_nombre_cuenta'=>'Depreciación de ferrocarriles',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.10,
'cat_sat_nombre_cuenta'=>'Depreciación de embarcaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.11,
'cat_sat_nombre_cuenta'=>'Depreciación de aviones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.12,
'cat_sat_nombre_cuenta'=>'Depreciación de troqueles, moldes, matrices y herramental',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.13,
'cat_sat_nombre_cuenta'=>'Depreciación de equipo de comunicaciones telefónicas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.14,
'cat_sat_nombre_cuenta'=>'Depreciación de equipo de comunicación satelital',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.15,
'cat_sat_nombre_cuenta'=>'Depreciación de equipo de adaptaciones para personas con capacidades diferentes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.16,
'cat_sat_nombre_cuenta'=>'Depreciación de maquinaria y equipo de generación de energía de fuentes renovables o de sistemas d',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.17,
'cat_sat_nombre_cuenta'=>'Depreciación de adaptaciones y mejoras',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>613.18,
'cat_sat_nombre_cuenta'=>'Depreciación de otra maquinaria y equipo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>614.00,
'cat_sat_nombre_cuenta'=>'Amortización contable',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>614.01,
'cat_sat_nombre_cuenta'=>'Amortización de gastos diferidos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>614.02,
'cat_sat_nombre_cuenta'=>'Amortización de gastos pre operativos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>614.03,
'cat_sat_nombre_cuenta'=>'Amortización de regalías, asistencia técnica y otros gastos diferidos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>614.04,
'cat_sat_nombre_cuenta'=>'Amortización de activos intangibles',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>614.05,
'cat_sat_nombre_cuenta'=>'Amortización de gastos de organización',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>614.06,
'cat_sat_nombre_cuenta'=>'Amortización de investigación y desarrollo de mercado',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>614.07,
'cat_sat_nombre_cuenta'=>'Amortización de marcas y patentes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>614.08,
'cat_sat_nombre_cuenta'=>'Amortización de crédito mercantil',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>614.09,
'cat_sat_nombre_cuenta'=>'Amortización de gastos de instalación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>614.10,
'cat_sat_nombre_cuenta'=>'Amortización de otros activos diferidos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Gastos'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>701.00,
'cat_sat_nombre_cuenta'=>'Gastos financieros',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>701.01,
'cat_sat_nombre_cuenta'=>'Pérdida cambiaria',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>701.02,
'cat_sat_nombre_cuenta'=>'Pérdida cambiaria nacional parte relacionada',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>701.03,
'cat_sat_nombre_cuenta'=>'Pérdida cambiaria extranjero parte relacionada',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>701.04,
'cat_sat_nombre_cuenta'=>'Intereses a cargo bancario nacional',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>701.05,
'cat_sat_nombre_cuenta'=>'Intereses a cargo bancario extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>701.06,
'cat_sat_nombre_cuenta'=>'Intereses a cargo de personas físicas nacional',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>701.07,
'cat_sat_nombre_cuenta'=>'Intereses a cargo de personas físicas extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>701.08,
'cat_sat_nombre_cuenta'=>'Intereses a cargo de personas morales nacional',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>701.09,
'cat_sat_nombre_cuenta'=>'Intereses a cargo de personas morales extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>701.10,
'cat_sat_nombre_cuenta'=>'Comisiones bancarias',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>701.11,
'cat_sat_nombre_cuenta'=>'Otros gastos financieros',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>702.00,
'cat_sat_nombre_cuenta'=>'Productos financieros',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>702.01,
'cat_sat_nombre_cuenta'=>'Utilidad cambiaria',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>702.02,
'cat_sat_nombre_cuenta'=>'Utilidad cambiaria nacional parte relacionada',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>702.03,
'cat_sat_nombre_cuenta'=>'Utilidad cambiaria extranjero parte relacionada',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>702.04,
'cat_sat_nombre_cuenta'=>'Intereses a favor bancarios nacional',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>702.05,
'cat_sat_nombre_cuenta'=>'Intereses a favor bancarios extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>702.06,
'cat_sat_nombre_cuenta'=>'Intereses a favor de personas físicas nacional',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>702.07,
'cat_sat_nombre_cuenta'=>'Intereses a favor de personas físicas extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>702.08,
'cat_sat_nombre_cuenta'=>'Intereses a favor de personas morales nacional',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>702.09,
'cat_sat_nombre_cuenta'=>'Intereses a favor de personas morales extranjero',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>702.10,
'cat_sat_nombre_cuenta'=>'Otros productos financieros',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>703.00,
'cat_sat_nombre_cuenta'=>'Otros gastos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.01,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de terrenos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.02,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de edificios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.03,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de maquinaria y equipo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.04,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de automóviles, autobuses, camiones de carga, tractocamiones, montacarga',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.05,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de mobiliario y equipo de oficina',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.06,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de equipo de cómputo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.07,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de equipo de comunicación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.08,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de activos biológicos, vegetales y semovientes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.09,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de otros activos fijos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.10,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de ferrocarriles',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.11,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de embarcaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.12,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de aviones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.13,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de troqueles, moldes, matrices y herramental',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.14,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de equipo de comunicaciones telefónicas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.15,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de equipo de comunicación satelital',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.16,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de equipo de adaptaciones para personas con capacidades diferentes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.17,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de maquinaria y equipo de generación de energía de fuentes renovables o',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.18,
'cat_sat_nombre_cuenta'=>'Pérdida en venta y/o baja de otra maquinaria y equipo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.19,
'cat_sat_nombre_cuenta'=>'Pérdida por enajenación de acciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.20,
'cat_sat_nombre_cuenta'=>'Pérdida por enajenación de partes sociales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>703.21,
'cat_sat_nombre_cuenta'=>'Otros gastos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>704.00,
'cat_sat_nombre_cuenta'=>'Otros productos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.01,
'cat_sat_nombre_cuenta'=>'Ganancia en venta y/o baja de terrenos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.02,
'cat_sat_nombre_cuenta'=>'Ganancia en venta y/o baja de edificios',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.03,
'cat_sat_nombre_cuenta'=>'Ganancia en venta y/o baja de maquinaria y equipo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.04,
'cat_sat_nombre_cuenta'=>'Ganancia en venta y/o baja de automóviles, autobuses, camiones de carga, tractocamiones, montacarg',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.05,
'cat_sat_nombre_cuenta'=>'Ganancia en venta y/o baja de mobiliario y equipo de oficina',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.06,
'cat_sat_nombre_cuenta'=>'Ganancia en venta y/o baja de equipo de cómputo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.07,
'cat_sat_nombre_cuenta'=>'Ganancia en venta y/o baja de equipo de comunicación',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.08,
'cat_sat_nombre_cuenta'=>'Ganancia en venta y/o baja de activos biológicos, vegetales y semovientes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.09,
'cat_sat_nombre_cuenta'=>'Ganancia en venta y/o baja de otros activos fijos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.10,
'cat_sat_nombre_cuenta'=>'Ganancia en venta y/o baja de ferrocarriles',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.11,
'cat_sat_nombre_cuenta'=>'Ganancia en venta y/o baja de embarcaciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.12,
'cat_sat_nombre_cuenta'=>'Ganancia en venta y/o baja de aviones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.13,
'cat_sat_nombre_cuenta'=>'Ganancia en venta y/o baja de troqueles, moldes, matrices y herramental',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.14,
'cat_sat_nombre_cuenta'=>'Ganancia en venta y/o baja de equipo de comunicaciones telefónicas',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.15,
'cat_sat_nombre_cuenta'=>'Ganancia en venta y/o baja de equipo de comunicación satelital',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.16,
'cat_sat_nombre_cuenta'=>'Ganancia en venta y/o baja de equipo de adaptaciones para personas con capacidades diferentes',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.17,
'cat_sat_nombre_cuenta'=>'Ganancia en venta de maquinaria y equipo de generación de energía de fuentes renovables o de siste',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.18,
'cat_sat_nombre_cuenta'=>'Ganancia en venta y/o baja de otra maquinaria y equipo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.19,
'cat_sat_nombre_cuenta'=>'Ganancia por enajenación de acciones',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.20,
'cat_sat_nombre_cuenta'=>'Ganancia por enajenación de partes sociales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.21,
'cat_sat_nombre_cuenta'=>'Ingresos por estímulos fiscales',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.22,
'cat_sat_nombre_cuenta'=>'Ingresos por condonación de adeudo',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>704.23,
'cat_sat_nombre_cuenta'=>'Otros productos',
'cat_sat_tipo'=>'Resultados',
'cat_sat_subtipo'=>'Resultado integral de financiamiento'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>801.00,
'cat_sat_nombre_cuenta'=>'UFIN del ejercicio',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>801.01,
'cat_sat_nombre_cuenta'=>'UFIN',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>801.02,
'cat_sat_nombre_cuenta'=>'Contra cuenta UFIN',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>802.00,
'cat_sat_nombre_cuenta'=>'CUFIN del ejercicio',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>802.01,
'cat_sat_nombre_cuenta'=>'CUFIN',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>802.02,
'cat_sat_nombre_cuenta'=>'Contra cuenta CUFIN',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>803.00,
'cat_sat_nombre_cuenta'=>'CUFIN de ejercicios anteriores',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>803.01,
'cat_sat_nombre_cuenta'=>'CUFIN de ejercicios anteriores',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>803.02,
'cat_sat_nombre_cuenta'=>'Contra cuenta CUFIN de ejercicios anteriores',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>804.00,
'cat_sat_nombre_cuenta'=>'CUFINRE del ejercicio',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>804.01,
'cat_sat_nombre_cuenta'=>'CUFINRE',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>804.02,
'cat_sat_nombre_cuenta'=>'Contra cuenta CUFINRE',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>805.00,
'cat_sat_nombre_cuenta'=>'CUFINRE de ejercicios anteriores',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>805.01,
'cat_sat_nombre_cuenta'=>'CUFINRE de ejercicios anteriores',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>805.02,
'cat_sat_nombre_cuenta'=>'Contra cuenta CUFINRE de ejercicios anteriores',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>806.00,
'cat_sat_nombre_cuenta'=>'CUCA del ejercicio',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>806.01,
'cat_sat_nombre_cuenta'=>'CUCA',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>806.02,
'cat_sat_nombre_cuenta'=>'Contra cuenta CUCA',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>807.00,
'cat_sat_nombre_cuenta'=>'CUCA de ejercicios anteriores',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>807.01,
'cat_sat_nombre_cuenta'=>'CUCA de ejercicios anteriores',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>807.02,
'cat_sat_nombre_cuenta'=>'Contra cuenta CUCA de ejercicios anteriores',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>808.00,
'cat_sat_nombre_cuenta'=>'Ajuste anual por inflación acumulable',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>808.01,
'cat_sat_nombre_cuenta'=>'Ajuste anual por inflación acumulable',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>808.02,
'cat_sat_nombre_cuenta'=>'Acumulación del ajuste anual inflacionario',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>809.00,
'cat_sat_nombre_cuenta'=>'Ajuste anual por inflación deducible',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>809.01,
'cat_sat_nombre_cuenta'=>'Ajuste anual por inflación deducible',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>809.02,
'cat_sat_nombre_cuenta'=>'Deducción del ajuste anual inflacionario',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>810.00,
'cat_sat_nombre_cuenta'=>'Deducción de inversión',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>810.01,
'cat_sat_nombre_cuenta'=>'Deducción de inversión',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>810.02,
'cat_sat_nombre_cuenta'=>'Contra cuenta deducción de inversiones',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>811.00,
'cat_sat_nombre_cuenta'=>'Utilidad o pérdida fiscal en venta y/o baja de activo fijo',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>811.01,
'cat_sat_nombre_cuenta'=>'Utilidad o pérdida fiscal en venta y/o baja de activo fijo',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>811.02,
'cat_sat_nombre_cuenta'=>'Contra cuenta utilidad o pérdida fiscal en venta y/o baja de activo fijo',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>812.00,
'cat_sat_nombre_cuenta'=>'Utilidad o pérdida fiscal en venta acciones o partes sociales',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>812.01,
'cat_sat_nombre_cuenta'=>'Utilidad o pérdida fiscal en venta acciones o partes sociales',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>812.02,
'cat_sat_nombre_cuenta'=>'Contra cuenta utilidad o pérdida fiscal en venta acciones o partes sociales',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>813.00,
'cat_sat_nombre_cuenta'=>'Pérdidas fiscales pendientes de amortizar actualizadas de ejercicios anteriores',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>813.01,
'cat_sat_nombre_cuenta'=>'Pérdidas fiscales pendientes de amortizar actualizadas de ejercicios anteriores',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>813.02,
'cat_sat_nombre_cuenta'=>'Actualización de pérdidas fiscales pendientes de amortizar de ejercicios anteriores',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>814.00,
'cat_sat_nombre_cuenta'=>'Mercancías recibidas en consignación',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>814.01,
'cat_sat_nombre_cuenta'=>'Mercancías recibidas en consignación',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>814.02,
'cat_sat_nombre_cuenta'=>'Consignación de mercancías recibidas',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>815.00,
'cat_sat_nombre_cuenta'=>'Crédito fiscal de IVA e IEPS por la importación de mercancías para empresas certificadas',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>815.01,
'cat_sat_nombre_cuenta'=>'Crédito fiscal de IVA e IEPS por la importación de mercancías',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>815.02,
'cat_sat_nombre_cuenta'=>'Importación de mercancías con aplicación de crédito fiscal de IVA e IEPS',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>816.00,
'cat_sat_nombre_cuenta'=>'Crédito fiscal de IVA e IEPS por la importación de activos fijos para empresas certificadas',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>816.01,
'cat_sat_nombre_cuenta'=>'Crédito fiscal de IVA e IEPS por la importación de activo fijo',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>816.02,
'cat_sat_nombre_cuenta'=>'Importación de activo fijo con aplicación de crédito fiscal de IVA e IEPS',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
			
CatSatModel::create( [

'cat_sat_nivel'=>1,
'cat_sat_codigo_agrupador'=>899.00,
'cat_sat_nombre_cuenta'=>'Otras cuentas de orden',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );

CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>899.01,
'cat_sat_nombre_cuenta'=>'Otras cuentas de orden',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );
		
CatSatModel::create( [

'cat_sat_nivel'=>2,
'cat_sat_codigo_agrupador'=>899.02,
'cat_sat_nombre_cuenta'=>'Contra cuenta otras Cuentas de orden',
'cat_sat_tipo'=>'Orden',
'cat_sat_subtipo'=>'Cuentas de orden'
] );


    }
}
