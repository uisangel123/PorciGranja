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
 * @property Granja $granja
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Corrale extends Model
{
    
    static $rules = [
		'name' => 'required',
		'granjas_id' => 'required',
		'disponibilidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','granjas_id','disponibilidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function granja()
    {
        return $this->hasOne('App\Models\Granja', 'id', 'granjas_id');
    }
    

}
