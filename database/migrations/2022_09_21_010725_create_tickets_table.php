<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string("opcion1");
            $table->string("opcion2");
            $table->string("opcion3")->nullable();
            $table->string("opcion4")->nullable();
            $table->unsignedBigInteger("usuario");
            $table->foreign("usuario")->references("id")->on("users")->onDelete("cascade");
            $table->string("fuente")->nullable();
            $table->string("tipo")->nullable();
            $table->string("prioridad")->nullable();
            $table->string("tema")->nullable();
            $table->text("descripcion")->nullable();
            $table->string("archivo")->nullable();
            $table->string("status")->nullable();
            $table->string("codigo")->nullable()->unique()->index();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
