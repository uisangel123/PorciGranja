<?php

namespace App\Http\Controllers;

use App\Models\Granja;
use Illuminate\Http\Request;

/**
 * Class GranjaController
 * @package App\Http\Controllers
 */
class GranjaController extends Controller
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
        $granjas = Granja::paginate();

        return view('granja.index', compact('granjas'))
            ->with('i', (request()->input('page', 1) - 1) * $granjas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $granja = new Granja();
        return view('granja.create', compact('granja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Granja::$rules);

        $granja = Granja::create($request->all());

        return redirect()->route('granjas.index')
            ->with('success', 'Granja created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $granja = Granja::find($id);

        return view('granja.show', compact('granja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $granja = Granja::find($id);

        return view('granja.edit', compact('granja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Granja $granja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Granja $granja)
    {
        request()->validate(Granja::$rules);

        $granja->update($request->all());

        return redirect()->route('granjas.index')
            ->with('success', 'Granja updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $granja = Granja::find($id)->delete();

        return redirect()->route('granjas.index')
            ->with('success', 'Granja deleted successfully');
    }
}
