<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCdsHasGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cds_has_genres', function (Blueprint $table) {
            $table->id('cds_has_genres');
            $table->foreignId('cd_id')->constrained('cds', 'cd_id');
            $table->unsignedSmallInteger('genre_id');
            $table->timestamps();

            $table->foreign('genre_id')->references('genre_id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cds_has_genres');
    }
}
