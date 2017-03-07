<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avances', function (Blueprint $table) {
            $table->increments('id');
            $table->string("asunto");
            $table->date("fecha");
            $table->string("tipo");
            $table->integer("id_cliente")->unsigned();
            $table->integer("id_abogado_caso")->unsigned();
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('id_abogado_caso')->references('id')->on('abogado_casos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avences');
    }
}
