<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vacunacione
 *
 * @property $id
 * @property $nombre
 * @property $id_lote_vacunación
 * @property $Fecha_Vacunación
 * @property $created_at
 * @property $updated_at
 *
 * @property Lote $lote
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vacunacione extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'id_lote_vacunación' => 'required',
		'Fecha_Vacunación' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','id_lote_vacunación','Fecha_Vacunación'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lote()
    {
        return $this->hasOne('App\Models\Lote', 'id', 'id_lote_vacunación');
    }
    

}
