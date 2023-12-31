<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Corrale
 *
 * @property $id
 * @property $name
 * @property $granjas_id
 * @property $disponibilidad
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Corrale extends Model
{
    
    static $rules = [
		'name' => 'required',
		'disponibilidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','disponibilidad'];
    
    

}
