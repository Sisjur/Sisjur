<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Espediente extends Model
{/**
 * The database table used by the model.
 *
 * @var string
 */
protected $table = 'espedientes';
/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
protected $fillable = ['id','fecha','url','descripcion','tipo','id_caso'];

public function caso()
{
    return $this->belongsTo('App\Caso');
}

}
