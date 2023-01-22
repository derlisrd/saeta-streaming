<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VentasController;
use Illuminate\Support\Facades\Route;

/*
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/login','/administrador/home');
Route::view('/administrador','Auth.login')->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'login'])->name('login.submit');

Route::group(['prefix'=>'administrador','middleware'=>['auth']],function(){
    Route::get('home',[HomeController::class,'index'])->name('home');

    Route::get('clientes',[ClientesController::class,'index'])->name('clientes');
    Route::post('clientes',[ClientesController::class,'search'])->name('clientes.search');
    Route::get('clientes/page/{page}',[ClientesController::class,'index'])->name('clientes.paginate');
    Route::get('clientes/create',[ClientesController::class,'create'])->name('clientes.create');
    Route::post('clientes/create',[ClientesController::class,'store'])->name('clientes.store');
    Route::get('cliente/{id}',[ClientesController::class,'edit'])->name('cliente.edit');
    Route::put('cliente/{id}',[ClientesController::class,'update'])->name('cliente.update');
    Route::delete('cliente/{id}',[ClientesController::class,'destroy'])->name('cliente.destroy');
    Route::get('cliente/{id}/cuentas',[ClientesController::class,'cuentas'])->name('cliente.cuentas');

    Route::get('cuentas',[CuentasController::class,'index'])->name('cuentas');
    Route::get('cuentas/create',[CuentasController::class,'create'])->name('cuentas.create');
    Route::post('cuentas/create',[CuentasController::class,'store'])->name('cuentas.store');
    Route::get('cuentas/edit/{id}',[CuentasController::class,'edit'])->name('cuentas.edit');
    Route::put('cuentas/update',[CuentasController::class,'update'])->name('cuentas.update');

    Route::get('cuentas/utilizadas/{id}',[CuentasController::class,'cuentas_utilizadas'])->name('cuentas.utilizadas');



    Route::get('ventas',[VentasController::class,'index'])->name('ventas');
    Route::get('ventas/create',[VentasController::class,'create'])->name('ventas.create');
    Route::post('ventas/create',[VentasController::class,'store'])->name('ventas.store');
    Route::get('ventas/renovar/{id}',[VentasController::class,'renovar'])->name('ventas.renovar');
    Route::post('ventas/renovar',[VentasController::class,'renovar_store'])->name('ventas.renovar.store');
    Route::delete('ventas/{id}',[VentasController::class,'destroy'])->name('ventas.destroy');


    Route::get('/users',[UsersController::class,'index'])->name('users');
    Route::get('/users/create',[UsersController::class,'create'])->name('users.create');
    Route::post('/users',[UsersController::class,'store'])->name('users.store');


    Route::get('/profile',[ProfileController::class,'index'])->name('profile');
    Route::post('/profile',[ProfileController::class,'update'])->name('profile.update');
    Route::post('/profile/pass',[ProfileController::class,'pass'])->name('profile.save.pass');



    Route::get("logout",[LoginController::class,'logout'])->name("logout");
});
