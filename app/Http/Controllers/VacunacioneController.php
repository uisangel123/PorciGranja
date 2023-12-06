<?php

namespace App\Http\Controllers;

use App\Models\Vacunacione;
use Illuminate\Http\Request;

/**
 * Class VacunacioneController
 * @package App\Http\Controllers
 */
class VacunacioneController extends Controller
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
        $vacunaciones = Vacunacione::paginate();

        return view('vacunacione.index', compact('vacunaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $vacunaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vacunacione = new Vacunacione();
        return view('vacunacione.create', compact('vacunacione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Vacunacione::$rules);

        $vacunacione = Vacunacione::create($request->all());

        return redirect()->route('vacunaciones.index')
            ->with('success', 'Vacunacion Creada Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacunacione = Vacunacione::find($id);

        return view('vacunacione.show', compact('vacunacione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacunacione = Vacunacione::find($id);

        return view('vacunacione.edit', compact('vacunacione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Vacunacione $vacunacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacunacione $vacunacione)
    {
        request()->validate(Vacunacione::$rules);

        $vacunacione->update($request->all());

        return redirect()->route('vacunaciones.index')
            ->with('success', 'Vacunacione Actualizada Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $vacunacione = Vacunacione::find($id)->delete();

        return redirect()->route('vacunaciones.index')
            ->with('success', 'Vacunacione Eliminada Correctamente');
    }
}
