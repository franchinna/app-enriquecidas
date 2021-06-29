<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cds', function (Blueprint $table) {

            //cd_id
            //Title
            //Description
            //Duration
            //Cost
            //release_date
            //Artist (FK)
            // El campo Artist requiere que creemos una tabla de Artist, y lo podemos agregar después.

            $table-> id('cd_id');
            $table-> string('title', 100);
            $table-> text('description');
            $table-> unsignedSmallInteger('duration');
            $table-> unsignedBigInteger('cost')->nullable();
            $table-> date('release_date')->format('Y-m-d')->nullable();

            $table-> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cds');
    }
}
