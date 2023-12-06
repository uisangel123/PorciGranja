<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use App\Models\Etapa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

/**
 * Class AlimentoController
 * @package App\Http\Controllers
 */
class AlimentoController extends Controller
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
        $alimentos = Alimento::paginate();

        return view('alimento.index', compact('alimentos'))
            ->with('i', (request()->input('page', 1) - 1) * $alimentos->perPage());
    }

    public function pdf()
    {
        $alimentos = Alimento::all();
        $fechaActual = Carbon::now()->format('d-m-Y H:i:s');
        $pdf = PDF::loadView('alimento.pdf', ['alimentos' => $alimentos]);
        return $pdf->download('Reporte Alimentos ' . $fechaActual . '.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etapas = Etapa::all();
        $alimento = new Alimento();
        return view('alimento.create', compact('alimento', 'etapas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Alimento::$rules);

        $alimento = Alimento::create($request->all());

        return redirect()->route('alimentos.index')
            ->with('success', 'Alimento Creado Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alimento = Alimento::find($id);

        return view('alimento.show', compact('alimento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alimento = Alimento::find($id);
        $etapas = Etapa::all();

        return view('alimento.edit', compact('alimento', 'etapas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Alimento $alimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alimento $alimento)
    {
        request()->validate(Alimento::$rules);

        $alimento->update($request->all());

        return redirect()->route('alimentos.index')
            ->with('success', 'Alimento Actualizado Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $alimento = Alimento::find($id)->delete();

        return redirect()->route('alimentos.index')
            ->with('success', 'Alimento Eliminado Correctamente');
    }
}
