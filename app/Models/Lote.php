<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lote
 *
 * @property $id
 * @property $Nombre
 * @property $id_corral
 * @property $id_Datos
 * @property $Cantidad_Porcinos
 * @property $created_at
 * @property $updated_at
 *
 * @property Alimentacione[] $alimentaciones //el error es porq no existe ese modal aun
 * @property Corrale $corrale
 * @property EtapaLote[] $etapaLotes
 * @property Nacimiento $nacimiento
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
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','id_corral','id_Datos','Cantidad_Porcinos'];


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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nacimiento()
    {
        return $this->hasOne('App\Models\Nacimiento', 'id', 'id_Datos');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vacunaciones()
    {
        return $this->hasMany('App\Models\Vacunacione', 'id_lote_vacunación', 'id');
    }
    

}
