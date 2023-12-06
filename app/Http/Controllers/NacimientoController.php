<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Models\Nacimiento;
use App\Models\Reproduccione;
use App\Models\Reproductore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class NacimientoController
 * @package App\Http\Controllers
 */
class NacimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $nacimientos = Nacimiento::where('users_id', $user)->get();

        return view('nacimiento.index', compact('nacimientos'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->id;
        $lote = Lote::where('Cantidad_Porcinos','<',40)->where('users_id', $user)->get();
        $nacimiento = new Nacimiento();
        // $reproducciones = Reproduccione::all();
        $reproductore = new Reproductore(); //revisar xdxddo o dejar pa despues y mirar otras cosas
        $reproducciones = Reproduccione::where('Estado', 'En Curso')->where('users_id', $user)->get();

        return view('nacimiento.create', compact('nacimiento', 'reproducciones', 'reproductore', 'lote'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request["users_id"] = Auth::user()->id;
        request()->validate(Nacimiento::$rules);
        $datos = $request->all();
        $nacimiento = Nacimiento::create($datos);

        $repro = Reproduccione::find($nacimiento->id_faseReproduccion);
        $lote = Lote::find($nacimiento->id_lote);
        if ($repro && $repro->Fecha_Final === null) {
            $repro->Fecha_Final = $nacimiento->Fecha_Nacimiento;
            $repro->Estado = "Finalizado";
            $repro->save();
        }
        if ($lote) {
            $lote->Cantidad_Porcinos += $nacimiento->Cantidad_Porcinos_Vivos;
            $lote->save();
        }


        return redirect()->route('nacimientos.index')
            ->with('success', 'Nacimiento Creado Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nacimiento = Nacimiento::find($id);

        return view('nacimiento.show', compact('nacimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //borre esto y mire pa hacer validación de q no permita trabajar con cerdos de otras reproducciones
    {
        $user = Auth::user()->id;
        $lote = Lote::where('Cantidad_Porcinos','<',40)->where('users_id', $user)->get();
        $nacimiento = Nacimiento::find($id);
        $reproducciones = Reproduccione::all();
        $reproductore = new Reproductore(); //revisar xdxddo o dejar pa despues y mirar otras cosas

        return view('nacimiento.edit', compact('nacimiento', 'reproducciones', 'reproductore', 'lote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Nacimiento $nacimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nacimiento $nacimiento)
    {
        $request["users_id"] = Auth::user()->id;
        request()->validate(Nacimiento::$rules);
        $datos = $request->all();

        $nacimiento->update($request->all());

        return redirect()->route('nacimientos.index')
            ->with('success', 'Nacimiento Actualizado Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $nacimiento = Nacimiento::find($id)->delete();

        return redirect()->route('nacimientos.index')
            ->with('success', 'Nacimiento Eliminado Correctamente');
    }
}
