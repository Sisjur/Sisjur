<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'especialidads';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['id','nombre','tipo','descipcion','fecha','url','instituto'];

  public function abogado(){
        return $this->belongsToMany('\App\Abogado','abogado_especialistas');
    }

}
