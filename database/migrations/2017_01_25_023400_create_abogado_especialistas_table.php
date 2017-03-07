<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbogadoEspecialistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abogado_especialistas', function (Blueprint $table) {

            $table->integer('id_abogado')->unsigned();
            $table->integer("id_especialista")->unsigned();
            $table->timestamps();

            $table->primary(["id_abogado","id_especialista"]);
            $table->foreign('id_abogado')->references('id')->on('abogados');
            $table->foreign('id_especialista')->references('id')->on('especialidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abogado_especialistas');
    }
}
