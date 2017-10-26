<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@index')->name('home');


/* mmabel routes section */
Route::get('/msl/{dbname}/{hashValue}/', 'ServController@makeSecureLogin');

/* end mmabel*/


/* ldaniel routes section */
Route::resource('clientes', 'ClienteController');
Route::resource('usuarios', 'UsuarioController');
Route::resource('roles', 'RolController');
Route::resource('permisos', 'PermisoController');
Route::resource('bits', 'BitsController');
Route::resource('proveedores', 'ProveedorController');
Route::resource('tclientes', 'TipoClienteController');
Route::resource('tproveedores', 'TipoProveedorController');
Route::resource('cuentas', 'CuentaController');
Route::resource('tsubcuentas', 'TipoSubCuentaController');
Route::resource('fspago', 'FormaPagoController');
Route::resource('pagos', 'PagoController');
Route::resource('polizas', 'PolizaController');
Route::resource('comprobantes', 'ComprobanteController');
Route::resource('asientos', 'AsientoController');
Route::resource('pagosrel', 'PagorelController');
Route::resource('periodos', 'PeriodoController');
Route::resource('ejercicios', 'EjercicioController');
Route::resource('balanzas', 'BalanzaController');
Route::resource('configs', 'ConfigController');
Route::resource('contconfig', 'ContConfigController');

/*Actions*/
Route::group(['prefix' => 'acciones'], function () {
   // Route::resource('account', 'AccountController');
	Route::get('subecomp', 'SubeCompController@index')->name('subecompindex');
	Route::post('subecompadd', 'SubeCompController@addComp')->name('subecompadd');
	Route::get('configcont/{step}', 'ConfigContController@index')->name('configcontindex');
	Route::get('reportconfigbg', 'ReportConfigController@indexBg')->name('reportconfigbg');
	Route::get('reportconfiger', 'ReportConfigController@indexEr')->name('reportconfiger');
});

Route::get('/downloadpc' , 'ConfigContController@downloadFile');

Route::post('/configpc' , 'ConfigContController@configPc')->name('configpc');
Route::post('/configpcclients' , 'ConfigContController@configPcClients')->name('configpcclients');
Route::post('/configpcprovs' , 'ConfigContController@configPcProvs')->name('configpcprovs');
Route::post('/configpcfinish' , 'ConfigContController@configPcFinish')->name('configpcfinish');

Route::post('/setreportbg' , 'ReportConfigController@setReportBg')->name('setreportbg');
Route::post('/setreporter' , 'ReportConfigController@setReportEr')->name('setreporter');

/*Ajax*/
Route::post('/getcpdata', 'Controller@getCpData');
Route::post('/delItems', 'Controller@delItems');
Route::post('/permsbyroles', 'Controller@permsbyroles');
Route::post('/prodingr', 'Controller@prodIngr');
Route::post('/prodgast', 'Controller@prodGast');
Route::post('/comprel', 'Controller@compRel');
Route::post('/provis', 'Controller@provis');
Route::post('/confconc', 'Controller@confConc');
Route::post('/unlinkfile', 'Controller@unlinkFile');
Route::post('/processfile', 'SubeCompController@processFile');
Route::post('/pasientos', 'Controller@pAsientos');
Route::post('/aprpolzs', 'Controller@aprPolzs');
/* end ldaniel*/




/* ppedro routes section */

/* end ppedro*/

Auth::routes();


