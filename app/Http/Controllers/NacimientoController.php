<?php

namespace App\Http\Controllers;

use App\Models\Nacimiento;
use App\Models\Reproduccione;
use App\Models\Reproductore;
use Illuminate\Http\Request;

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
        $nacimientos = Nacimiento::paginate();

        return view('nacimiento.index', compact('nacimientos'))
            ->with('i', (request()->input('page', 1) - 1) * $nacimientos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nacimiento = new Nacimiento();
        // $reproducciones = Reproduccione::all();
        $reproductore = new Reproductore(); //revisar xdxddo o dejar pa despues y mirar otras cosas
        $reproducciones = Reproduccione::where('Estado', 'En Curso')->get();

        return view('nacimiento.create', compact('nacimiento', 'reproducciones', 'reproductore'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Nacimiento::$rules);

        $nacimiento = Nacimiento::create($request->all());

        $repro = Reproduccione::find($nacimiento->id_faseReproduccion);

        if ($repro && $repro->Fecha_Final === null) {
            $repro->Fecha_Final = $nacimiento->Fecha_Nacimiento;
            $repro->Estado = "Finalizado";
            $repro->save();
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
        $nacimiento = Nacimiento::find($id);
        $reproducciones = Reproduccione::all();

        return view('nacimiento.edit', compact('nacimiento', 'reproducciones'));
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
        request()->validate(Nacimiento::$rules);

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
