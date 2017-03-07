<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbogadoCaso extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'abogado_casos';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['id','id_abogado','id_caso'];

  public function avance()
  {
      return $this->hasMany('App\Avence');
  }

  public function observacion()
  {
      return $this->hasMany('App\Observacion');
  }

  public function cita()
  {
      return $this->hasMany('App\Cita');
  }

}
