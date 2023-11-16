<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EtapaLote
 *
 * @property $id
 * @property $Nombre
 * @property $id_lote
 * @property $id_etapa
 * @property $Fecha_inicial
 * @property $Fecha_final
 * @property $Peso_inicial
 * @property $Peso_final
 * @property $Cantidad_inicial
 * @property $Cantidad_final
 * @property $Muertes_totales
 * @property $Porcentaje_Mortalidad
 * @property $id_alimento
 * @property $Observaciones
 * @property $id_alimentacion
 * @property $Estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Alimentacione $alimentacione
 * @property Alimento $alimento
 * @property Etapa $etapa
 * @property Lote $lote
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EtapaLote extends Model
{
    
    static $rules = [
		'Nombre' => 'required',
		'id_lote' => 'required',
		'id_etapa' => 'required',
		'Fecha_inicial' => 'required',
		'Peso_inicial' => 'required',
		'Cantidad_inicial' => 'required',
		'id_alimento' => 'required',
		'Observaciones' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','id_lote','id_etapa','Fecha_inicial','Fecha_final','Peso_inicial','Peso_final','Cantidad_inicial','Cantidad_final','Muertes_totales','Porcentaje_Mortalidad','id_alimento','Observaciones','id_alimentacion','Estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function alimentacione()
    {
        return $this->hasOne('App\Models\Alimentacione', 'id', 'id_alimentacion');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function alimento()
    {
        return $this->hasOne('App\Models\Alimento', 'id', 'id_alimento');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function etapa()
    {
        return $this->hasOne('App\Models\Etapa', 'id', 'id_etapa');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lote()
    {
        return $this->hasOne('App\Models\Lote', 'id', 'id_lote');
    }
    

}
