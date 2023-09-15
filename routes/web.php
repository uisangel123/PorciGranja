<?php

use App\Http\Controllers\AlimentoController;
use App\Http\Controllers\EtapaController;
use App\Http\Controllers\EtapaLoteController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GranjaController;
use App\Http\Controllers\CorraleController;
use App\Http\Controllers\ReproductoreController;
use App\Http\Controllers\VacunacioneController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('home.index');
  })->middleware(['auth']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home.index');//le agregue en el name el .index para q funcione la ruta de volver al inicio

Route::resource('reproductores',ReproductoreController::class);
Route::resource('granjas',GranjaController::class);
Route::resource('corrales',CorraleController::class);
Route::resource('alimentos',AlimentoController::class);
Route::resource('etapas',EtapaController::class);
Route::resource('etapa-lotes',EtapaLoteController::class);
Route::resource('lotes',LoteController::class);
Route::resource('users',UserController::class);//agregar una ruta desde las opciones del user para acceder a sus datos
Route::resource('vacunaciones',VacunacioneController::class);


Route::post('users/{user}/edit', [UserController::class, 'actualizarPassword'])->name('actualizarPassword')->middleware('web');