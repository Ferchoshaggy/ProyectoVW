<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateReplyticketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replytickets', function (Blueprint $table) {
            $table->id();
            $table->string('replica')->nullable();
            $table->string('image_url')->nullable();
            $table->unsignedBigInteger("id_ticket");
            $table->foreign("id_ticket")->references("id")->on("tickets")->onDelete("cascade");
            $table->unsignedBigInteger("id_user");
            $table->foreign("id_user")->references("id")->on("users")->onDelete("cascade");
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
        Schema::dropIfExists('replytickets');
    }
}
