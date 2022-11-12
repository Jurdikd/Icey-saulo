<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Parroquia
 *
 * @property $id
 * @property $nombre
 * @property $municipio_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Cursante $cursante
 * @property Espacio[] $espacios
 * @property Facilitador $facilitador
 * @property Municipio $municipio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Parroquia extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'municipio_id' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','municipio_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cursante()
    {
        return $this->hasMany('App\Models\Cursante');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function espacios()
    {
        return $this->hasMany('App\Models\Espacio');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function facilitador()
    {
        return $this->hasMany('App\Models\Facilitador');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function municipio()
    {
        return $this->belongsTo('App\Models\Municipio');
    }
    

}
