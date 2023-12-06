<?php

namespace App\Http\Controllers;

use App\Models\Corrale;
use App\Models\Granja;
use Illuminate\Http\Request;

/**
 * Class CorraleController
 * @package App\Http\Controllers
 */
class CorraleController extends Controller
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
        $corrales = Corrale::paginate();

        return view('corrale.index', compact('corrales'))
            ->with('i', (request()->input('page', 1) - 1) * $corrales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $corrale = new Corrale();
        $granjas = Granja::all();
        return view('corrale.create', compact('corrale'), compact('granjas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Corrale::$rules);

        $corrale = Corrale::create($request->all());

        return redirect()->route('corrales.index')
            ->with('success', 'Corrale Creado Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $corrale = Corrale::find($id);

        return view('corrale.show', compact('corrale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $corrale = Corrale::find($id);
        $granjas = Granja::all();
        return view('corrale.edit', compact('corrale','granjas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Corrale $corrale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Corrale $corrale)
    {
        request()->validate(Corrale::$rules);
       

        $corrale->update($request->all());
   

        return redirect()->route('corrales.index')
            ->with('success', 'Corral Actualizado Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $corrale = Corrale::find($id)->delete();

        return redirect()->route('corrales.index')
            ->with('success', 'Corral Eliminado Correctamente');
    }
}
