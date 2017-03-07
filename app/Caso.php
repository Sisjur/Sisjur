<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'casos';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['id','fecha_inicio','fecha_fin','nombre_juez','id_cliente','descripcion','radicado','estado','tipo'];


    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function espediente()
    {
        return $this->hasMany('App\Espediente');
    }

    public function abogado(){
        return $this->belongsToMany('\App\Abogado','abogado_casos');
    }

}
