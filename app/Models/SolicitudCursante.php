<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SolicitudCursante
 *
 * @property $id
 * @property $estatus
 * @property $cursante_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Cursante $cursante
 * @property CursoSolicitudCursante[] $cursoSolicitudCursantes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SolicitudCursante extends Model
{
    
    static $rules = [
        
		'curso' => 'required',
		'cursante_id' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['curso','cursante_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cursante()
    {
        return $this->hasOne('App\Models\Cursante', 'id', 'cursante_id');
    }
    public function cursoSolicitado()
    {
        return $this->hasOne('App\Models\Curso', 'id', 'curso');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursoSolicitudCursantes()
    {
        return $this->hasMany('App\Models\CursoSolicitudCursante', 'solicitud_cursante_id', 'id');
    }
    

}
