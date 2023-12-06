<?php

use App\Http\Controllers\AlimentacionController;
use App\Http\Controllers\AlimentacioneController;
use App\Http\Controllers\AlimentacionItemController;
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
use App\Http\Controllers\NacimientoController;
use App\Http\Controllers\RazaController;
use App\Http\Controllers\ReproduccioneController;
use App\Http\Controllers\VacunacioneController;
use App\Http\Controllers\ReproductoreController;
use App\Models\Nacimiento;

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
  return redirect()->route('home.index');
})->middleware(['auth']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home.index'); //le agregue en el name el .index para q funcione la ruta de volver al inicio

Route::get('lote/pdf', [LoteController::class, 'pdf'])->name('lote.pdf');
Route::get('Reproduccione/pdf', [ReproduccioneController::class, 'pdf'])->name('Reproduccione.pdf');
Route::get('alimento/pdf', [AlimentoController::class, 'pdf'])->name('alimento.pdf');
Route::get('etapa-lote/pdf', [EtapaLoteController::class, 'pdf'])->name('etapa-lote.pdf');


Route::resource('reproductores', ReproductoreController::class)->middleware('auth');
Route::resource('corrales', CorraleController::class);
Route::resource('alimentos', AlimentoController::class);
Route::resource('etapas', EtapaController::class)->middleware('role');
Route::resource('etapa-lotes', EtapaLoteController::class);
Route::resource('lotes', LoteController::class);
Route::resource('users', UserController::class); //agregar una ruta desde las opciones del user para acceder a sus datos
Route::resource('vacunaciones', VacunacioneController::class)->middleware('auth');
Route::resource('reproducciones', ReproduccioneController::class)->middleware('auth');
Route::resource('nacimientos', NacimientoController::class)->middleware('auth');
Route::resource('alimentacion', AlimentacioneController::class)->middleware('auth');
Route::resource('razas', RazaController::class)->middleware('auth')->middleware('role');
Route::post('/buscarDinamico', [LoteController::class, 'buscarDinamico']);
Route::post('/buscarDisponibles', [ReproduccioneController::class, 'buscarDisponibles']);
Route::post('/buscarLote', [LoteController::class, 'buscarLote']);


Route::post('users/{user}/edit', [UserController::class, 'actualizarPassword'])->name('actualizarPassword')->middleware('web');
