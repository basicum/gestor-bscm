<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::auth();

Route::get('/', 'HomeController@index')->name('home');
Route::get('terceros', 'TercerosController@todosTerceros')->name('terceros');
Route::get('dominios', 'DominiosController@todosDominios')->name('dominios');
Route::get('/nota{id}', 'EventosController@eliminar' )->name('notas.update');
Route::get('/nuevanota', 'EventosController@crearNota' )->name('notas.crear');
