<?php

use Illuminate\Database\Seeder;
use App\FormaPago;

class FormaPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormaPago::create( [
'formpago_formpagosat_cod'=>'01',
'formpago_formpagosat_nom'=>'Efectivo'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'02',
'formpago_formpagosat_nom'=>'Cheque'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'03',
'formpago_formpagosat_nom'=>'Transferencia'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'04',
'formpago_formpagosat_nom'=>'Tarjeta de crédito'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'05',
'formpago_formpagosat_nom'=>'Monederos electrónicos'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'06',
'formpago_formpagosat_nom'=>'Dinero electrónico'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'07',
'formpago_formpagosat_nom'=>'Tarjetas digitales'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'08',
'formpago_formpagosat_nom'=>'Vales de despensa'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'09',
'formpago_formpagosat_nom'=>'Bienes'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'10',
'formpago_formpagosat_nom'=>'Servicio'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'11',
'formpago_formpagosat_nom'=>'Por cuenta de servicio'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'12',
'formpago_formpagosat_nom'=>'Dación en pago'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'13',
'formpago_formpagosat_nom'=>'Pago por subrogación'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'14',
'formpago_formpagosat_nom'=>'Pago por consignación'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'15',
'formpago_formpagosat_nom'=>'Condonación'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'16',
'formpago_formpagosat_nom'=>'Cancelación'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'17',
'formpago_formpagosat_nom'=>'Compensación'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'98',
'formpago_formpagosat_nom'=>'NA'
] );


			
FormaPago::create( [
'formpago_formpagosat_cod'=>'99',
'formpago_formpagosat_nom'=>'Otros'
] );
    }
}
