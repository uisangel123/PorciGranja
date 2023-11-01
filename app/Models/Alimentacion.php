<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alimentacion
 *
 * @property $id
 * @property $id_alimentacion
 * @property $promedio_semanal
 * @property $promedio_diario
 * @property $Semana
 * @property $dia_1
 * @property $dia_2
 * @property $dia_3
 * @property $dia_4
 * @property $dia_5
 * @property $dia_6
 * @property $dia_7
 * @property $created_at
 * @property $updated_at
 *
 * @property Alimentacione $alimentacione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Alimentacion extends Model
{
    
    static $rules = [
		'id_alimentacion' => 'required',
		'promedio_diario' => 'required',
		'Semana' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_alimentacion','promedio_semanal','promedio_diario','Semana','dia_1','dia_2','dia_3','dia_4','dia_5','dia_6','dia_7'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function alimentacione()
    {
        return $this->hasOne('App\Models\Alimentacione', 'id', 'id_alimentacion');
    }
    

}
