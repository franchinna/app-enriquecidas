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
            $table->id('id');
            $table->foreignId('cd_id')->constrained('cds', 'cd_id');
            $table->foreignId('genre_id')->constrained('genres', 'genre_id');
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
        Schema::dropIfExists('cds_has_genres');
    }
}
