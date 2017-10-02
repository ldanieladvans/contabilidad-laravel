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

/*Ajax*/
Route::post('/getcpdata', 'Controller@getCpData');
Route::post('/delItems', 'Controller@delItems');
/* end ldaniel*/




/* ppedro routes section */

/* end ppedro*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
