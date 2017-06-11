<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $start_date = '2015-12-31 00:00:00';
        $end_date = '1950-01-01 00:00:00';

        $min = strtotime($start_date);
        $max = strtotime($end_date);

        // Generate random number using above bounds
        $val = rand($min, $max);
        $weeks = rand(1, 52);

        $start = new DateTime(date('Y-m-d H:i:s', $val));
        DB::table('personas')->insert([
          'dni'     =>'123456',
          'nombre'  =>'admin',
          'apellido'=>'istrador',
          'fecha_nac'=>$start,
          'telefono'=>'5555555',
          'celular'=>'7777777',
          'correo'  =>'admin@gmail.com',
          'password'=>password_hash('12345',PASSWORD_DEFAULT),
          'tipo'=>'administrador',
          'estado'=>"Activo"
        ]);
    }
}
