<?php

namespace App\Http\Controllers;

use App\Models\Alimentacion;
use App\Models\Alimentacione;
use App\Models\EtapaLote;
use App\Models\Lote;
use Illuminate\Http\Request;

/**
 * Class AlimentacioneController
 * @package App\Http\Controllers
 */
class AlimentacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alimentaciones = Alimentacione::paginate();

        return view('alimentacione.index', compact('alimentaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $alimentaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alimentacione = new Alimentacione();
        $alimentacion = new Alimentacion();
        // $lote = new Lote();
        $etapaLote = new EtapaLote();
        $etapa = EtapaLote::where('Estado', 'En curso')->whereNull('id_alimentacion')->pluck('id_lote');
        $lote = Lote::whereIn('id', $etapa)->latest();

        return view('alimentacione.create', compact('alimentacione', 'alimentacion', 'lote', 'etapa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Alimentacione::$rules);
        $dato = $request->all();
        $alimentacione = Alimentacione::create($dato);
        if ($alimentacione) {
            $idAlimentacion = $alimentacione->id;
            $id_lote = $alimentacione->id_lote;
            $etapaLote = EtapaLote::where('id_lote', $id_lote)->where('Estado', 'En curso')->first();
            $etapaLote->update(['id_alimentacion' => $idAlimentacion]);
            $request['id_alimentacion'] = $alimentacione->id;
            $ali = request()->validate(Alimentacion::$rules);
            for ($i = 0; $i < count($ali['Semana']); $i++) {
                $datos = [
                    'id_alimentacion' => $alimentacione->id,
                    'promedio_semanal' => $dato['promedio_semanal'][$i],
                    'Semana' => $dato['Semana'][$i],
                    'dia_1' => $dato['dia_1'][$i],
                    'dia_2' => $dato['dia_2'][$i],
                    'dia_3' => $dato['dia_3'][$i],
                    'dia_4' => $dato['dia_4'][$i],
                    'dia_5' => $dato['dia_5'][$i],
                    'dia_6' => $dato['dia_6'][$i],
                    'dia_7' => $dato['dia_7'][$i],
                    'muertos' => $dato['muertos'][$i],
                    'consumo' => $dato['consumo'][$i],
                ];
                Alimentacion::create($datos);
            }
        }
        return redirect()->route('alimentacion.index')
            ->with('success', 'Alimentacione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alimentacione = Alimentacione::find($id);
        $alimentacion = Alimentacion::where('id_alimentacion', $id)->get();
        return view('alimentacione.show', compact('alimentacione', 'alimentacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alimentacione = Alimentacione::find($id);
        $alimentacion = Alimentacion::where('id_alimentacion', $id)->get();
        $lote = new Lote();

        return view('alimentacione.edit', compact('alimentacione', 'alimentacion', 'lote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Alimentacione $alimentacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alimentacione $alimentacione, $id)
    {
        $confirmacion = $request->input('confirmacion12');
        $etapaLote = EtapaLote::where('id_alimentacion', $id)->first(); //cuando le de al create la casilla debe llenarse con el id de alimentación en la etapaLote
        if ($confirmacion ==  0) { //terminar el seleccionar si una alimentación finalizo o no

        } else {
            $etapaLote->Estado = 'Finalizado';
            $etapaLote->save();
        }
        request()->validate(Alimentacione::$rules);
        $dato = $request->all();
        if ($alimentacione->update($dato) || $dato != null) {
            $datos = $request->all('promedio_semanal', 'promedio_diario', 'Semana', 'dia_1', 'dia_2', 'dia_3', 'dia_4', 'dia_5', 'dia_6', 'dia_7', 'muertos', 'consumo', 'id');
            $ids = $request->all('id');
            for ($i = 0; $i < count($ids['id']); $i++) {
                $idVarios = $datos['id'][$i];
                $item = $datos;
                if ($idVarios && $item['Semana'][$i]) {
                    $newData = Alimentacion::find($item['id'][$i]);
                    $newData->promedio_semanal = $dato['promedio_semanal'][$i];
                    $newData->Semana = $dato['Semana'][$i];
                    $newData->dia_1 = $dato['dia_1'][$i];
                    $newData->dia_2 = $dato['dia_2'][$i];
                    $newData->dia_3 = $dato['dia_3'][$i];
                    $newData->dia_4 = $dato['dia_4'][$i];
                    $newData->dia_5 = $dato['dia_5'][$i];
                    $newData->dia_6 = $dato['dia_6'][$i];
                    $newData->dia_7 = $dato['dia_7'][$i];
                    $newData->muertos = $dato['muertos'][$i];
                    $newData->consumo = $dato['consumo'][$i];
                    $newData->save();
                } else if (!$idVarios && $item['Semana'][$i]) {
                    $newData = [
                        'id_alimentacion' => $id,
                        'promedio_semanal' => $item['promedio_semanal'][$i],
                        'Semana' => $item['Semana'][$i],
                        'dia_1' => $item['dia_1'][$i],
                        'dia_2' => $item['dia_2'][$i],
                        'dia_3' => $item['dia_3'][$i],
                        'dia_4' => $item['dia_4'][$i],
                        'dia_5' => $item['dia_5'][$i],
                        'dia_6' => $item['dia_6'][$i],
                        'dia_7' => $item['dia_7'][$i],
                        'muertos' => $item['muertos'][$i],
                        'consumo' => $item['consumo'][$i],
                    ];
                    Alimentacion::create($newData);
                }
            }


            return redirect()->route('alimentacion.index')
                ->with('success', 'Alimentacione updated successfully');
        } else {
            return redirect()->route('alimentacion.index')
                ->with('success', 'Error al editar');
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $alimentacione = Alimentacione::find($id)->delete();

        return redirect()->route('alimentacion.index')
            ->with('success', 'Alimentacione deleted successfully');
    }
}
