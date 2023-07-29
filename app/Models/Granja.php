<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Granja
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Corrale[] $corrales
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Granja extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function corrales()
    {
        return $this->hasMany('App\Models\Corrale', 'granjas_id', 'id');
    }
    

}
