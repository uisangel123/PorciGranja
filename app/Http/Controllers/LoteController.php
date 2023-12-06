<?php

namespace App\Http\Controllers;

use App\Models\Corrale;
use App\Models\EtapaLote;
use App\Models\Lote;
use App\Models\Nacimiento;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

/**
 * Class LoteController
 * @package App\Http\Controllers
 */
class LoteController extends Controller
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
        $lotes = Lote::paginate();

        return view('lote.index', compact('lotes'))
            ->with('i', (request()->input('page', 1) - 1) * $lotes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function pdf()
    {
        $lotes = Lote::all();
        $fechaActual = Carbon::now()->format('d-m-Y H:i:s');
        $pdf = PDF::loadView('lote.pdf', ['lotes' => $lotes]);
        return $pdf->download('Reporte Lotes ' . $fechaActual . '.pdf');
    }

    public function create()
    {
        $lote = new Lote();
        $corrales = Corrale::all();
        $datos = Nacimiento::all();
        return view('lote.create', compact('lote', 'corrales', 'datos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Lote::$rules);

        $lote = Lote::create($request->all());

        return redirect()->route('lotes.index')
            ->with('success', 'Lote Creado Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lote = Lote::find($id);

        return view('lote.show', compact('lote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lote = Lote::find($id);
        $corrales = Corrale::all();
        $datos = Nacimiento::all();

        return view('lote.edit', compact('lote', 'corrales', 'datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Lote $lote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lote $lote)
    {
        request()->validate(Lote::$rules);

        $lote->update($request->all());

        return redirect()->route('lotes.index')
            ->with('success', 'Lote Actualizado Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lote = Lote::find($id)->delete();

        return redirect()->route('lotes.index')
            ->with('success', 'Lote Eliminado Correctamente');
    }
    public function buscarDinamico(Request $request)
    {
        $seleccionarDatos = $request->input('id_Datos');
        $buscarDatos = Nacimiento::find($seleccionarDatos)->Cantidad_Porcinos_Vivos;
        $datos = Nacimiento::all();
        $data = [
            'buscarDatos' => $buscarDatos,
            'datos' => $datos,
        ];
        return response()->json($data);
    }
    public function buscarLote(Request $request)
    {
        $seleccionarDatos = $request->input('id_Datos');
        $buscarDatos = Lote::find($seleccionarDatos)->Cantidad_Porcinos;
        // $datos = Nacimiento::all();
        $data = [
            'buscarDatos' => $buscarDatos,
            // 'datos' => $datos,
        ];
        return response()->json($data);
    }
}
