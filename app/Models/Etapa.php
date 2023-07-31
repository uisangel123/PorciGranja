<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Etapa
 *
 * @property $id
 * @property $Nombre
 * @property $Descripción
 * @property $created_at
 * @property $updated_at
 *
 * @property Alimento[] $alimentos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Etapa extends Model
{
    
    static $rules = [
		'Nombre' => 'required',
		'Descripción' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','Descripción'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alimentos()
    {
        return $this->hasMany('App\Models\Alimento', 'etapa_alimento_id', 'id');
    }
    

}
