<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Raza
 *
 * @property $id
 * @property $Nombre
 * @property $Descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Raza extends Model
{
    
    static $rules = [
		'Nombre' => 'required',
		'Descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','Descripcion'];



}
