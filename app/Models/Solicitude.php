<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Solicitude
 *
 * @property $id
 * @property $fecha
 * @property $estatus
 * @property $curso_id
 * @property $facilitador_id
 * @property $espacio_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Curso $curso
 * @property Espacio $espacio
 * @property Facilitador $facilitador
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Solicitude extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'curso_id' => 'required',
		'facilitador_id' => 'required',
		'espacio_id' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','estatus','curso_id','facilitador_id','espacio_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function curso()
    {
        return $this->belongsTo('App\Models\Curso');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function espacio()
    {
        return $this->belongsTo('App\Models\Espacio');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function facilitador()
    {
        return $this->belongsTo('App\Models\Facilitador');
    }
    public function aprobado()
    {
        return $this->hasOne('App\Models\Solicitude');
    }
    

}
