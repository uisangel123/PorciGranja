<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Nacimiento
 *
 * @property $id
 * @property $id_faseReproduccion
 * @property $Fecha_Nacimiento
 * @property $Peso_Promedio
 * @property $Cantidad_Porcinos_Total
 * @property $Cantidad_Porcinos_Criales
 * @property $Cantidad_Porcinos_Reproductores
 * @property $Cantidad_Porcinos_Muertos
 * @property $Cantidad_Porcinos_Vivos
 * @property $id_lote
 * @property $created_at
 * @property $updated_at
 *
 * @property Lote $lote
 * @property Reproduccione $reproduccione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Nacimiento extends Model
{

    static $rules = [
        'id_faseReproduccion' => 'required',
        'Fecha_Nacimiento' => 'required',
        'Peso_Promedio' => 'required',
        'Cantidad_Porcinos_Total' => 'required',
        'Cantidad_Porcinos_Criales' => 'required',
        'Cantidad_Porcinos_Reproductores' => 'required',
        'Cantidad_Porcinos_Muertos' => 'required',
        'Cantidad_Porcinos_Vivos' => 'required',
        'users_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_faseReproduccion', 'Fecha_Nacimiento', 'Peso_Promedio', 'Cantidad_Porcinos_Total', 'Cantidad_Porcinos_Criales', 'Cantidad_Porcinos_Reproductores', 'Cantidad_Porcinos_Muertos', 'Cantidad_Porcinos_Vivos', 'id_lote', 'users_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lote()
    {
        return $this->hasOne('App\Models\Lote', 'id', 'id_lote');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reproduccione()
    {
        return $this->hasOne('App\Models\Reproduccione', 'id', 'id_faseReproduccion');
    }
}
