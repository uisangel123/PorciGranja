<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lote
 *
 * @property $id
 * @property $Nombre
 * @property $id_corral
 * @property $Cantidad_Porcinos
 * @property $created_at
 * @property $updated_at
 *
 * @property Alimentacione[] $alimentaciones
 * @property Corrale $corrale
 * @property EtapaLote[] $etapaLotes
 * @property Nacimiento[] $nacimientos
 * @property Vacunacione[] $vacunaciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lote extends Model
{
    
    static $rules = [
		'Nombre' => 'required',
		'id_corral' => 'required',
		'Cantidad_Porcinos' => 'required',
		'users_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','id_corral','Cantidad_Porcinos', 'users_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alimentaciones()
    {
        return $this->hasMany('App\Models\Alimentacione', 'id_lote', 'id');
    }
    
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
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nacimientos()
    {
        return $this->hasMany('App\Models\Nacimiento', 'id_lote', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vacunaciones()
    {
        return $this->hasMany('App\Models\Vacunacione', 'id_lote_vacunación', 'id');
    }
    

}
