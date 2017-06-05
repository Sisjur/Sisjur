<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'personas';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['id','dni','nombre','apellido','fecha_nac','estado','telefono','celular','correo','password','tipo'];
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];


      public function abogado(){
        return $this->belongsTo('App\Abogado');
      }

      public function cliente(){
        return $this->belongsTo('App\Cliente');
      }
}
