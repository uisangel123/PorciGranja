<?php

namespace App\Http\Controllers;

use App\Models\Reproduccione;
use App\Models\Reproductore;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

/**
 * Class ReproduccioneController
 * @package App\Http\Controllers
 */
class ReproduccioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reproducciones = Reproduccione::paginate();

        return view('reproduccione.index', compact('reproducciones'))
            ->with('i', (request()->input('page', 1) - 1) * $reproducciones->perPage());
    }

    public function pdf()
    {
        $reproducciones = Reproduccione::all();
        $fechaActual = Carbon::now()->format('d-m-Y H:i:s');
        $pdf = PDF::loadView('reproduccione.pdf', ['reproducciones' => $reproducciones]);
        return $pdf->download('Reporte Reproducciones ' . $fechaActual . '.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edadminima = 2; //dato para determinar la edad minima para los porcinos reproductores
        $reproduccione = new Reproduccione();
        $reproducciones = Reproduccione::whereNull('Fecha_Final')->get(); //todas las reproducciones que tengan la fecha final en null(son procesos sin acabar)
        $macho = $reproducciones->pluck('id_Porcino_Macho'); //esas repros q no han terminado, obtenemos los porcinos macho cruzado
        $hembra = $reproducciones->pluck('id_Porcino_Hembra'); //esas repros q no han terminado, obtenemos las porcinos hembra cruzado
        $machosDisponibles = Reproductore::where('Genero', 'Macho') //llamamos todos los porcinos reproductores por genero macho
            ->whereNotIn('id', $macho) //todos los machos cruzados en repros sin terminar, se comparan con todos los reproductores y si coinciden su id, no seran filtrados
            ->whereDate('Fecha_nacimiento', '<=', Carbon::now()->subDays($edadminima)) //Fecha_nacimiento es un valor de cada repro q si no cumple para poder cruzar no sera filtrado
            ->get(); //obtenemos todos los machos q finalmente cumplieron las condiciones pasadas
        // $hembrasDisponibles = Reproductore::where('Genero', 'Hembra') //mismo proceso para las hembras q lo de machos
        //     ->whereNotIn('id', $hembra)
        //     ->whereDate('Fecha_nacimiento', '<=', Carbon::now()->subDays($edadminima))
        //     ->get();
        $hembrasDisponibles = collect([]);

        return view('reproduccione.create', compact('reproduccione', 'machosDisponibles', 'hembrasDisponibles')); //los datos los mandamos por el compact
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Reproduccione::$rules);

        $reproduccione = Reproduccione::create($request->all());

        return redirect()->route('reproducciones.index')
            ->with('success', 'Reproduccion Creada Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reproduccione = Reproduccione::find($id);

        return view('reproduccione.show', compact('reproduccione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reproduccione = Reproduccione::find($id);

        return view('reproduccione.edit', compact('reproduccione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Reproduccione $reproduccione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reproduccione $reproduccione)
    {
        request()->validate(Reproduccione::$rules);

        $reproduccione->update($request->all());

        return redirect()->route('reproducciones.index')
            ->with('success', 'Reproduccione Actualizada Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $reproduccione = Reproduccione::find($id)->delete();

        return redirect()->route('reproducciones.index')
            ->with('success', 'Reproduccione Eliminada Correctamente');
    }
    public function buscarDisponibles(Request $request)
    {
        $edadminima = 2; //dato para determinar la edad minima para los porcinos reproductores
        $reproducciones = Reproduccione::whereNull('Fecha_Final')->get(); //todas las reproducciones que tengan la fecha final en null(son procesos sin acabar)
        $seleccionado = $request->input('macho'); //2
        $hembra = $reproducciones->pluck('id_Porcino_Hembra'); //esas repros q no han terminado, obtenemos las porcinos hembra cruzado
        $hembrasDisponibles = Reproductore::where('Genero', 'Hembra') //mismo proceso para las hembras q lo de machos
            ->whereNotIn('id', $hembra)
            ->whereDate('Fecha_nacimiento', '<=', Carbon::now()->subDays($edadminima))
            ->get();
        $hola = $hembrasDisponibles->where('Porcino_Macho','!=', $seleccionado);
        $hola2 = collect($hola)->values();
        return response()->json([
            "hola" => $hola2,
            "macho" => $seleccionado,
        ]);
    }
}
