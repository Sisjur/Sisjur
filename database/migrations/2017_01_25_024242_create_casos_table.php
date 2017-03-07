<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->increments('id');
            $table->date("fecha_inicio");
            $table->date("fecha_fin")->nullable();
            $table->string("nombre_juez")->nullable();
            $table->integer("id_cliente")->unsigned();
            $table->string("descripcion");
            $table->string("radicado")->nullable();
            $table->boolean("estado")->default(false);
            $table->string("tipo")->default("");
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casos');
    }
}
