<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbogadoEspecialista extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'abogado_especialistas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','id_abogado','id_especialista'];
}
