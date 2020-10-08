<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('app');
});


Route::prefix('maestro')->group(function(){
    Route::post('usuarios','MaestroController@getUsuarios');
    Route::get('paises','MaestroController@getPaises');
    Route::get('departamentos','MaestroController@getDepartamentos');
    Route::post('ciudades','MaestroController@getCiudades');
});
