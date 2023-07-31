<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alimento
 *
 * @property $id
 * @property $Nombre
 * @property $Marca
 * @property $Precio
 * @property $Cantidad
 * @property $Descripción
 * @property $etapa_alimento_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Etapa $etapa
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Alimento extends Model
{
    
    static $rules = [
		'Nombre' => 'required',
		'Marca' => 'required',
		'Precio' => 'required',
		'Cantidad' => 'required',
		'Descripción' => 'required',
		'etapa_alimento_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','Marca','Precio','Cantidad','Descripción','etapa_alimento_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function etapa()
    {
        return $this->hasOne('App\Models\Etapa', 'id', 'etapa_alimento_id');
    }
    

}
