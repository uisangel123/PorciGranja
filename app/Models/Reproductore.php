<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reproductore
 *
 * @property $id
 * @property $Fecha_nacimiento
 * @property $Raza
 * @property $Genero
 * @property $Peso
 * @property $Procedencia
 * @property $created_at
 * @property $updated_at
 * @property $Descripción
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reproductore extends Model
{
    
    static $rules = [
		'id' => 'required',
		'Fecha_nacimiento' => 'required',
		'Raza' => 'required',
		'Genero' => 'required',
		'Peso' => 'required',
		'Procedencia' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','Fecha_nacimiento','Raza','Genero','Peso','Procedencia'];



}
