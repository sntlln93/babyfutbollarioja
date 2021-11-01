<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('categories');
            $table->boolean('has_fixture')->default(false);
            $table->string('photo');

            //visibility
            $table->boolean('is_main')->default(false);
            $table->boolean('is_public')->default(false);

            //config
            $table->boolean('double_game');
            $table->enum('type', config('types'));

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
        Schema::dropIfExists('tournaments');
    }
}
