  <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espedientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable();
            $table->date("fecha");
            $table->string("url")->nullable();
            $table->string("descripcion");
            $table->string("tipo_documento");
            $table->string('tipo_remitente');
            $table->integer("id_caso")->unsigned();
            $table->timestamps();

            $table->foreign('id_caso')->references('id')->on('casos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('espedientes');
    }
}
