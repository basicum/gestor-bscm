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
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
Route::auth();

Route::get('/', 'HomeController@index')->name('home');


Route::get('/nota{id}', 'EventosController@eliminar' )->name('notas.eliminar');
Route::get('/nuevanota', 'EventosController@crearNota' )->name('notas.crear');

Route::get('terceros', 'TercerosController@todosTerceros')->name('terceros');
Route::get('/modif_tercero_{id}', 'TercerosController@visualizaTercero' )->name('modif_tercero');
Route::post('/modif_tercero_{id}', 'TercerosController@actualizarTercero' )->name('terceros.update');
Route::get('/nuevo_tercero', 'TercerosController@crearTercero' )->name('terceros.crear');

Route::get('dominios', 'DominiosController@todosDominios')->name('dominios');


Route::get('/archivos','UploadFileController@index');
Route::post('/archivos','UploadFileController@showUploadFile');

Route::get('facturas_clientes','FacturasController@todasFacturas')->name('facturas_clientes');
Route::get('/modif_factura_cliente_{id}', 'FacturasController@visualizaFacturaCliente' )->name('modif_factura_cliente');
Route::post('/modif_factura_cliente_{id}', 'FActurasController@actualizarFacturaCliente' )->name('factura_cliente.update');
Route::get('/nueva_factura_cliente', 'FacturasController@crearFacturaCliente_' )->name('factura_cliente.crear');
