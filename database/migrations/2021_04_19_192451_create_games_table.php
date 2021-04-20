<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->integer('local_score');
            $table->integer('away_score');
            $table->string('state')->default('PENDIENTE');

            $table->unsignedBigInteger('local_id');
            $table->unsignedBigInteger('away_id');

            $table->foreign('local_id')->references('id')->on('teams');
            $table->foreign('away_id')->references('id')->on('teams');

            $table->foreignId('tournament_id')->constrained();
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
        Schema::dropIfExists('games');
    }
}
