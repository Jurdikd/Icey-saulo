<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cursante
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $cedula
 * @property $fecha_nacimiento
 * @property $telefono
 * @property $correo
 * @property $parroquia_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Parroquia $parroquia
 * @property SolicitudCursante[] $solicitudCursantes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cursante extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellido' => 'required',
		'cedula' => 'required',
		'fecha_nacimiento' => 'required',
		'telefono' => 'required',
		'parroquia_id' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido','cedula','fecha_nacimiento','telefono','correo','parroquia_id'];


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
    public function solicitudCursantes()
    {
        return $this->hasMany('App\Models\SolicitudCursante', 'cursante_id', 'id');
    }
    

}
