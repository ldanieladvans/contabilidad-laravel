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

Route::get('/', function () {
    return view('welcome');
});


/* mmabel routes section */

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

/*Ajax*/
Route::post('/getcpdata', 'Controller@getCpData');
Route::post('/delItems', 'Controller@delItems');
Route::post('/permsbyroles', 'Controller@permsbyroles');
/* end ldaniel*/




/* ppedro routes section */

/* end ppedro*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
