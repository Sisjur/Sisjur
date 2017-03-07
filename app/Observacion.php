<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'observacions';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['id','nota','fecha','titulo','id_abogado_caso'];

  public function abogado_caso()
  {
      return $this->belongsTo('App\AbogadoCaso');
  }
}
