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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('pedidos', 'livewire.pedidos.index')->middleware('auth');
	Route::view('servicios', 'livewire.servicios.index')->middleware('auth');
	Route::view('productos', 'livewire.productos.index')->middleware('auth');
	Route::view('pagos', 'livewire.pagos.index')->middleware('auth');	
	Route::view('facturas', 'livewire.facturas.index')->middleware('auth');
	Route::view('envios', 'livewire.envios.index')->middleware('auth');
	