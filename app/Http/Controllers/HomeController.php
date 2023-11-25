<?php

namespace App\Http\Controllers;

use App\Models\Alimentacion;
use App\Models\Nacimiento;
use App\Models\Reproductore;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reproductores = Reproductore::whereMonth('created_at', now()->month)->count();
        $datosNacimiento = Nacimiento::whereMonth('created_at', now()->month)->sum('Cantidad_Porcinos_Muertos');
        $alimentacion = Alimentacion::whereMonth('created_at', now()->month)->sum('muertos');
        $suma = $datosNacimiento + $alimentacion;
        $alimento = Alimentacion::whereMonth('created_at', now()->month)->sum('consumo');

        return view('home.index', compact('reproductores','suma', 'alimento'));//cambie la ruta q antes era home solamente y tambien cambien el nombre del archivo a index y esta dentro de la carpeta home
    }
}
