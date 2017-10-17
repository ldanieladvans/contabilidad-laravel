<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/createbd', 'ServController@createbd')->middleware('auth:api');
Route::get('/dropbd', 'ServController@dropbd')->middleware('auth:api');
Route::get('/getroles', 'ServController@getroles')->middleware('auth:api')->middleware('changebd');
Route::get('/adduser', 'ServController@adduser')->middleware('auth:api')->middleware('changebd');
Route::get('/dropuser', 'ServController@dropuser')->middleware('auth:api')->middleware('changebd');
Route::get('/getbitc', 'ServController@getbitc')->middleware('auth:api')->middleware('changebd');
Route::get('/createbackp', 'ServController@createbackp')->middleware('auth:api')->middleware('changebd');
Route::get('/loginservice', 'ServController@loginservice')->middleware('auth:api')->middleware('changebd');
Route::get('/restorebackp', 'ServController@restorebackp')->middleware('auth:api')->middleware('changebd');
Route::get('/moduser', 'ServController@moduser')->middleware('auth:api')->middleware('changebd');