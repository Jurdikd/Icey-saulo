<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Espacio
 *
 * @property $id
 * @property $direccion
 * @property $estatus
 * @property $parroquia_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Parroquia $parroquia
 * @property Solicitude[] $solicitudes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Espacio extends Model
{
    
    static $rules = [
		'direccion' => 'required',
		'parroquia_id' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['direccion','estatus','parroquia_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parroquia()
    {
        return $this->belongsTo('App\Models\Parroquia');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solicitude()
    {
        return $this->hasMany('App\Models\Solicitude');
    }
    

}
