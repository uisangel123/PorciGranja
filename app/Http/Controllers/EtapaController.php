<?php

namespace App\Http\Controllers;

use App\Models\Etapa;
use Illuminate\Http\Request;

/**
 * Class EtapaController
 * @package App\Http\Controllers
 */
class EtapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $etapas = Etapa::paginate();

        return view('etapa.index', compact('etapas'))
            ->with('i', (request()->input('page', 1) - 1) * $etapas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etapa = new Etapa();
        return view('etapa.create', compact('etapa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Etapa::$rules);

        $etapa = Etapa::create($request->all());

        return redirect()->route('etapas.index')
            ->with('success', 'Etapa Creada Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etapa = Etapa::find($id);

        return view('etapa.show', compact('etapa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etapa = Etapa::find($id);

        return view('etapa.edit', compact('etapa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Etapa $etapa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etapa $etapa)
    {
        request()->validate(Etapa::$rules);

        $etapa->update($request->all());

        return redirect()->route('etapas.index')
            ->with('success', 'Etapa Actualizada Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $etapa = Etapa::find($id)->delete();

        return redirect()->route('etapas.index')
            ->with('success', 'Etapa Eliminada Correctamente');
    }
}
