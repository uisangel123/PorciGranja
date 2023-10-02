<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reproductore
 *
 * @property $id
 * @property $Raza
 * @property $Genero
 * @property $Peso
 * @property $Porcino_Macho
 * @property $Porcino_Hembra
 * @property $Fecha_nacimiento
 * @property $created_at
 * @property $updated_at
 *
 * @property Reproduccione[] $reproducciones
 * @property Reproductore $reproductore
 * @property Reproductore[] $reproductores
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reproductore extends Model
{
    
    static $rules = [
		'id' => 'required',
		'Raza' => 'required',
		'Genero' => 'required',
		'Peso' => 'required',
		// 'Porcino_Macho' => 'required',
		// 'Porcino_Hembra' => 'required',
		'Fecha_nacimiento' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','Raza','Genero','Peso','Porcino_Macho','Porcino_Hembra','Fecha_nacimiento'];

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reproducciones()
    {
        return $this->hasMany('App\Models\Reproduccione', 'id_Porcino_Hembra', 'id');
    }
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reproductores()
    {
        return $this->hasMany('App\Models\Reproductore', 'Porcino_Macho', 'id');
    }
    protected $casts = [
        'Porcino_Macho' => 'integer',
        'Porcino_Hembra' => 'integer',
    ];
    

}
