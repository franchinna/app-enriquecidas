<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            
            $table->id('cart_id');
            $table->unsignedSmallInteger('cd_id');
            $table->unsignedSmallInteger('quantity');
            $table->unsignedSmallInteger('order');
            $table-> string('status', 100);
            $table-> date('order_date')->format('Y-m-d')->nullable();
            
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
        Schema::dropIfExists('cart');
    }
}
