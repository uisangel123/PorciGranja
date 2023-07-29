<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PorcinoController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home.index');//le agregue en el name el .index para q funcione la ruta de volver al inicio

Route::resource('porcinos',PorcinoController::class)->middleware(['auth']);// el middleware funciona como un verificador de estado, si no esta loggeado no podra acceder a esa vista
