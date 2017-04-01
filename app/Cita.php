<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'citas';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['id','asunto','descripcion','fecha','id_abogado_caso'];


    public function abogado_caso()
    {
        return $this->belongsTo('App\AbogadoCaso');
    }

}
