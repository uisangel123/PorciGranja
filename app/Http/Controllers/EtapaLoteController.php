<?php

namespace App\Http\Controllers;

use App\Models\EtapaLote;
use App\Models\Corrale;
use App\Models\Lote;
use App\Models\Alimento;
use App\Models\Etapa;
use Illuminate\Http\Request;

/**
 * Class EtapaLoteController
 * @package App\Http\Controllers
 */
class EtapaLoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etapaLotes = EtapaLote::paginate();

        return view('etapa-lote.index', compact('etapaLotes'))
            ->with('i', (request()->input('page', 1) - 1) * $etapaLotes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etapaLote = new EtapaLote();
        $lotes = Lote::all();
        $corrales = Corrale::all();
        $etapas = Etapa::all();
        $alimentos = Alimento::all();

        return view('etapa-lote.create', compact('etapaLote','lotes','corrales','etapas','alimentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EtapaLote::$rules);

        $etapaLote = EtapaLote::create($request->all());

        return redirect()->route('etapa-lotes.index')
            ->with('success', 'EtapaLote created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etapaLote = EtapaLote::find($id);

        return view('etapa-lote.show', compact('etapaLote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etapaLote = EtapaLote::find($id);
        $lotes = Lote::all();
        $corrales = Corrale::all();
        $etapas = Etapa::all();
        $alimentos = Alimento::all();

        return view('etapa-lote.edit', compact('etapaLote','lotes','corrales','etapas','alimentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EtapaLote $etapaLote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EtapaLote $etapaLote)
    {
        request()->validate(EtapaLote::$rules);

        $etapaLote->update($request->all());

        return redirect()->route('etapa-lotes.index')
            ->with('success', 'EtapaLote updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $etapaLote = EtapaLote::find($id)->delete();

        return redirect()->route('etapa-lotes.index')
            ->with('success', 'EtapaLote deleted successfully');
    }
}
