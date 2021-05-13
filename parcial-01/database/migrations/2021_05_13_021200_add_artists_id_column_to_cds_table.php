<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArtistsIdColumnToCdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cds', function (Blueprint $table) {
            //
            $table->unsignedSmallInteger('artist_id');
            $table->foreign('artist_id')->references('artist_id')->on('artists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cds', function (Blueprint $table) {
            //
            $table->dropForeign('artist_id');
            $table->dropColumn('artist_id');
        });
    }
}
