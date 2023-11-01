<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alimentacione
 *
 * @property $id
 * @property $id_lote
 * @property $id_Etapa_Lote
 * @property $created_at
 * @property $updated_at
 *
 * @property Alimentacion[] $alimentacions
 * @property EtapaLote $etapaLote
 * @property Lote $lote
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Alimentacione extends Model
{
    
    static $rules = [
		'id_lote' => 'required',
        'id_Etapa_Lote'=> 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_lote','id_Etapa_Lote'];


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
    public function etapaLote()
    {
        return $this->hasOne('App\Models\EtapaLote', 'id', 'id_Etapa_Lote');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lote()
    {
        return $this->hasOne('App\Models\Lote', 'id', 'id_lote');
    }
    

}
