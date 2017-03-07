<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'clientes';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['id'];

    /**
      * Get the personas record associated with the Cliente.
     */
    public function  persona(){
      return $this->hasOne('App\Persona');
    }

    public function caso()
    {
        return $this->hasMany('App\Caso');
    }

    public function avance()
    {
        return $this->hasMany('App\Avence');
    }
}
