<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reproduccione
 *
 * @property $id
 * @property $id_Porcino_Macho
 * @property $id_Porcino_Hembra
 * @property $Fecha_Inicio
 * @property $Fecha_Final
 * @property $created_at
 * @property $updated_at
 *
 * @property Nacimiento[] $nacimientos
 * @property Reproductore $reproductore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reproduccione extends Model
{
    
    static $rules = [
		'id_Porcino_Macho' => 'required',
		'id_Porcino_Hembra' => 'required',
		'Fecha_Inicio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_Porcino_Macho','id_Porcino_Hembra','Fecha_Inicio','Fecha_Final','Estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nacimientos()
    {
        return $this->hasMany('App\Models\Nacimiento', 'id_faseReproduccion', 'id');
    }
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reproductore()
    {
        return $this->hasOne('App\Models\Reproductore', 'id', 'id_Porcino_Macho');
    }
    

}
