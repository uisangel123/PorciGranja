<?php

namespace App\Http\Controllers;

use App\Models\Porcino;
use Illuminate\Http\Request;

/**
 * Class PorcinoController
 * @package App\Http\Controllers
 */
class PorcinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $porcinos = Porcino::paginate();

        return view('porcino.index', compact('porcinos'))
            ->with('i', (request()->input('page', 1) - 1) * $porcinos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $porcino = new Porcino();
        return view('porcino.create', compact('porcino'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Porcino::$rules);

        $porcino = Porcino::create($request->all());

        return redirect()->route('porcinos.index')
            ->with('success', 'Porcino created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $porcino = Porcino::find($id);

        return view('porcino.show', compact('porcino'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $porcino = Porcino::find($id);

        return view('porcino.edit', compact('porcino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Porcino $porcino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Porcino $porcino)
    {
        request()->validate(Porcino::$rules);

        $porcino->update($request->all());

        return redirect()->route('porcinos.index')
            ->with('success', 'Porcino updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $porcino = Porcino::find($id)->delete();

        return redirect()->route('porcinos.index')
            ->with('success', 'Porcino deleted successfully');
    }
}
