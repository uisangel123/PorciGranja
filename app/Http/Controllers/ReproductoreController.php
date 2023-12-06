<?php

namespace App\Http\Controllers;

use App\Models\Raza;
use App\Models\Reproductore;
use Illuminate\Http\Request;

/**
 * Class ReproductoreController
 * @package App\Http\Controllers
 */
class ReproductoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reproductores = Reproductore::paginate();

        return view('reproductore.index', compact('reproductores'))
            ->with('i', (request()->input('page', 1) - 1) * $reproductores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reproductore = new Reproductore();
        $razas = Raza::all();
        $reproductoreMacho = Reproductore::where('Genero', 'Macho')->get();
        $reproductoreHembra = Reproductore::where('Genero', 'Hembra')->get();
        return view('reproductore.create', compact('reproductore', 'reproductoreMacho', 'reproductoreHembra', 'razas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Reproductore::$rules);

        $reproductore = Reproductore::create($request->all());


        return redirect()->route('reproductores.index')
            ->with('success', 'Reproductor Creado Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reproductore = Reproductore::find($id);

        return view('reproductore.show', compact('reproductore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reproductore = Reproductore::find($id);
        $razas = Raza::all();
        $reproductoreMacho = Reproductore::where('Genero', 'Macho')->get();
        $reproductoreHembra = Reproductore::where('Genero', 'Hembra')->get();
        return view('reproductore.edit', compact('reproductore', 'reproductoreMacho', 'reproductoreHembra', 'razas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Reproductore $reproductore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reproductore $reproductore)
    {
        request()->validate(Reproductore::$rules);

        $reproductore->update($request->all());

        return redirect()->route('reproductores.index')
            ->with('success', 'Reproductor Actualizado Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $reproductore = Reproductore::find($id)->delete();

        return redirect()->route('reproductores.index')
            ->with('success', 'Reproductore Eliminado Correctamente');
    }
}
