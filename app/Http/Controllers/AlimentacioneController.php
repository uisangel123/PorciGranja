<?php

namespace App\Http\Controllers;

use App\Models\Alimentacion;
use App\Models\Alimentacione;
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
        $lote = new Lote();
        return view('alimentacione.create', compact('alimentacione', 'alimentacion', 'lote'));
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
            $request['id_alimentacion'] = $alimentacione->id;
            $ali = request()->validate(Alimentacion::$rules);
            for ($i = 0; $i < count($ali['Semana']); $i++) {
                $datos = [
                    'id_alimentacion' => $alimentacione->id,
                    'promedio_semanal' => $dato['promedio_semanal'][$i],
                    'promedio_diario' => $dato['promedio_diario'][$i],
                    'Semana' => $dato['Semana'][$i],
                    'dia_1' => $dato['dia_1'][$i],
                    'dia_2' => $dato['dia_2'][$i],
                    'dia_3' => $dato['dia_3'][$i],
                    'dia_4' => $dato['dia_4'][$i],
                    'dia_5' => $dato['dia_5'][$i],
                    'dia_6' => $dato['dia_6'][$i],
                    'dia_7' => $dato['dia_7'][$i],
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

        return view('alimentacione.edit', compact('alimentacione', 'alimentacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Alimentacione $alimentacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alimentacione $alimentacione)
    {
        request()->validate(Alimentacione::$rules);
        $datos = $request->all();
        if ($alimentacione->update($datos)) {
            $datos = $request->all();
        }

        $alimentacione->update($request->all('promedio_semanal', 'promedio_diario', 'Semana', 'dia_1', 'dia_2', 'dia_3', 'dia_4', 'dia_5', 'dia_6', 'dia_7', 'id'));
        $ids = $request->all('id');
        for ($i = 0; $i < count($ids); $i++) {
            $id = $datos['id'][$i];
            $data = $datos;
            if ($id && $data['Semana'][$i]) {
                $newData = Alimentacion::find($data['id'][$i]);
                $newData->promedio_semanal = $data['promedio_semanal'][$i];
                $newData->promedio_diario = $data['promedio_diario'][$i];
                $newData->Semana = $data['Semana'][$i];
                $newData->dia_1 = $data['dia_1'][$i];
                $newData->dia_2 = $data['dia_2'][$i];
                $newData->dia_3 = $data['dia_3'][$i];
                $newData->dia_4 = $data['dia_4'][$i];
                $newData->dia_5 = $data['dia_5'][$i];
                $newData->dia_6 = $data['dia_6'][$i];
                $newData->dia_7 = $data['dia_7'][$i];
                $newData->save();
            } else if ($id && !$data['Semana'][$i]) {
                if (Alimentacion::find($id)->delete()) {
                }
            } else if (!$id && $data['Semana'][$i]) {
                $newData = [
                    'id_alimentacion' => $alimentacione->id,
                    'promedio_semanal' => $data['promedio_semanal'][$i],
                    'promedio_diario' => $data['promedio_diario'][$i],
                    'Semana' => $data['Semana'][$i],
                    'dia_1' => $data['dia_1'][$i],
                    'dia_2' => $data['dia_2'][$i],
                    'dia_3' => $data['dia_3'][$i],
                    'dia_4' => $data['dia_4'][$i],
                    'dia_5' => $data['dia_5'][$i],
                    'dia_6' => $data['dia_6'][$i],
                    'dia_7' => $data['dia_7'][$i],
                ];
                Alimentacion::create($newData);
            }
        }

        return redirect()->route('alimentacion.index')
            ->with('success', 'Alimentacione updated successfully');
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
