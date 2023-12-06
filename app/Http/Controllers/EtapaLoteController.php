<?php

namespace App\Http\Controllers;

use App\Models\EtapaLote;
use App\Models\Corrale;
use App\Models\Lote;
use App\Models\Alimento;
use App\Models\Etapa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

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
        $user = Auth::user()->id;
        $etapaLotes = EtapaLote::where('users_id', $user)->get();

        return view('etapa-lote.index', compact('etapaLotes'))
            ->with('i');
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

        return view('etapa-lote.create', compact('etapaLote', 'lotes', 'corrales', 'etapas', 'alimentos'));
    }


    public function pdf()
    {
        $etapaLote = EtapaLote::all();
        $fechaActual = Carbon::now()->format('d-m-Y H:i:s');
        $pdf = PDF::loadView('etapa-lote.pdf', ['etapaLotes' => $etapaLote]);
        return $pdf->download('Reporte Etapa Lote ' . $fechaActual . '.pdf');
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
        request()->validate(EtapaLote::$rules);
        $datos = $request->all();
        $etapaLote = EtapaLote::create($datos);

        return redirect()->route('etapa-lotes.index')
            ->with('success', 'EtapaLote Creada Exitosamente.');
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

        return view('etapa-lote.edit', compact('etapaLote', 'lotes', 'corrales', 'etapas', 'alimentos'));
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
        $request["users_id"] = Auth::user()->id;
        request()->validate(EtapaLote::$rules);
        $datos = $request->all();

        $etapaLote->update($request->all());

        return redirect()->route('etapa-lotes.index')
            ->with('success', 'EtapaLote Actualizado Correctamente');
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
            ->with('success', 'EtapaLote Eliminado Correctamente');
    }
}
