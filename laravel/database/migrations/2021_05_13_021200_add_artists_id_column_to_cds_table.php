<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArtistsIdColumnToCdsTable extends Migration
{
    public function up()
    {
        Schema::table('cds', function (Blueprint $table) {
            $table->unsignedBigInteger('artist_id')->nullable();
            $table->foreign('artist_id')->references('artist_id')->on('artists');
        });
    }

    public function down()
    {
        Schema::table('cds', function (Blueprint $table) {
            $table->dropForeign(['artist_id']);
            $table->dropColumn('artist_id');
        });
    }
}
