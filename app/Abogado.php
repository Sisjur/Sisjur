<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abogado extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'abogados';
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

    public function especialidad(){
        return $this->belongsToMany('\App\Especialidad','abogado_especialistas');
    }

    public function caso(){
        return $this->belongsToMany('\App\Caso','abogado_casos');
    }
}
