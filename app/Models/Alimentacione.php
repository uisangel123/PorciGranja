<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alimentacione
 *
 * @property $id
 * @property $id_lote
 * @property $created_at
 * @property $updated_at
 *
 * @property Alimentacion[] $alimentacions
 * @property Lote $lote
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Alimentacione extends Model
{
    
    static $rules = [
		'id_lote' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_lote'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alimentacions()
    {
        return $this->hasMany('App\Models\Alimentacion', 'id_alimentacion', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lote()
    {
        return $this->hasOne('App\Models\Lote', 'id', 'id_lote');
    }
    

}
