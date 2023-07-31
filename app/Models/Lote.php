<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lote
 *
 * @property $id
 * @property $Nombre
 * @property $id_corral
 * @property $created_at
 * @property $updated_at
 *
 * @property Corrale $corrale
 * @property EtapaLote[] $etapaLotes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lote extends Model
{
    
    static $rules = [
		'Nombre' => 'required',
		'id_corral' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','id_corral'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function corrale()
    {
        return $this->hasOne('App\Models\Corrale', 'id', 'id_corral');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function etapaLotes()
    {
        return $this->hasMany('App\Models\EtapaLote', 'id_lote', 'id');
    }
    

}
