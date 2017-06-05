<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->date("fecha_inicio");
            $table->date("fecha_fin")->nullable();
            $table->integer("id_cliente")->unsigned();
            $table->string("descripcion");
            $table->string("estado")->nullable();
            $table->string("tipo")->default("");
            $table->integer('caso')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('caso')->references('id')->on('casos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
