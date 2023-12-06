<?php

namespace App\Http\Controllers;

use App\Models\Alimentacion;
use Illuminate\Http\Request;

/**
 * Class AlimentacionController
 * @package App\Http\Controllers
 */
class AlimentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alimentacions = Alimentacion::paginate();

        return view('alimentacion.index', compact('alimentacions'))
            ->with('i', (request()->input('page', 1) - 1) * $alimentacions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alimentacion = new Alimentacion();
        return view('alimentacion.create', compact('alimentacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Alimentacion::$rules);

        $alimentacion = Alimentacion::create($request->all());

        return redirect()->route('alimentacionxd.index')
            ->with('success', 'Alimentacion Creada Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alimentacion = Alimentacion::find($id);

        return view('alimentacion.show', compact('alimentacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alimentacion = Alimentacion::find($id);

        return view('alimentacion.edit', compact('alimentacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Alimentacion $alimentacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alimentacion $alimentacion)
    {
        request()->validate(Alimentacion::$rules);

        $alimentacion->update($request->all());

        return redirect()->route('alimentacionxd.index')
            ->with('success', 'Alimentacion Actualizada Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $alimentacion = Alimentacion::find($id)->delete();

        return redirect()->route('alimentacions.index')
            ->with('success', 'Alimentacion Eliminada Correctamente');
    }
}
