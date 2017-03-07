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
            $table->date("fecha");
            $table->string("url");
            $table->string("descripcion");
            $table->string("tipo");
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
