<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avence extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'avances';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['id','asunto','fecha','id_cliente','id_abogado_caso','tipo'];

  public function cliente()
  {
      return $this->belongsTo('App\Cliente');
  }

  public function abogado_caso()
  {
      return $this->belongsTo('App\AbogadoCaso');
  }

}
