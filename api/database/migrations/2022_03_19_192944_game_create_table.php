<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GameCreateTable extends Migration
{

    public function up()
    {
        Schema::create('game', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('nb_players');
            $table->unsignedBigInteger('organisateur_id')->unsigned();
            $table->foreign('organisateur_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('terrain', ['MARAIS', 'PLOUZANE', 'LANDERNEAU']);
            $table->boolean('visibility');
            $table->boolean('draft');
            $table->softDeletes();
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
        Schema::dropIfExists('game');
    }
}
