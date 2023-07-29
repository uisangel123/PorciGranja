<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Porcino
 *
 * @property $id
 * @property $Raza
 * @property $Genero
 * @property $Peso
 * @property $created_at
 * @property $updated_at
 * @property $Descripción
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Porcino extends Model
{
    
    static $rules = [
		'Raza' => 'required',
		'Genero' => 'required',
		'Peso' => 'required',
		'Descripción' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Raza','Genero','Peso','Descripción'];



}
