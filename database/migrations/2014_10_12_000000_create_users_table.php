<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string("foto")->nullable();
            $table->string("genero")->nullable();
            $table->string("concesionaria")->nullable();
            $table->unsignedBigInteger('tipo_user');
            $table->foreign("tipo_user")->references("id")->on("tipo_users")->onDelete("cascade");
            $table->unsignedBigInteger('id_inventario')->nullable();
            $table->foreign("id_inventario")->references("id")->on("inventories");
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
