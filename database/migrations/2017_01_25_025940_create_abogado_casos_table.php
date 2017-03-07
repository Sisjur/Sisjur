<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbogadoCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abogado_casos', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('id_abogado')->unsigned();
            $table->integer("id_caso")->unsigned();
            $table->timestamps();

            $table->unique(["id_caso","id_abogado"]);
            $table->foreign('id_caso')->references('id')->on('casos');
            $table->foreign('id_abogado')->references('id')->on('abogados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abogado_casos');
    }
}
