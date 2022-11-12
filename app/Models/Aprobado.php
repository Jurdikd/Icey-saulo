<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Aprobado
 *
 * @property $id
 * @property $descripcion
 * @property $horas
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $cupos
 * @property $created_at
 * @property $updated_at
 * @property $solicitude_id
 *
 * @property CursoSolicitudCursante[] $cursoSolicitudCursantes
 * @property Solicitude $solicitude
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Aprobado extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'horas' => 'required',
		'fecha_inicio' => 'required',
		'fecha_fin' => 'required',
		'cupos' => 'required',
		'solicitude_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','horas','fecha_inicio','fecha_fin','cupos','solicitude_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursoSolicitudCursantes()
    {
        return $this->hasMany('App\Models\CursoSolicitudCursante', 'aprobado_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function solicitude()
    {
        return $this->belongsTo('App\Models\Solicitude');
    }
    

}
