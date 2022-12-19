<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('baskets', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('totalprice');
        //     $table->string('totaldiscount');
        //     $table->unsignedInteger('user_id');
        //     $table->foreign('user_id')->references('id')->on('users');

        //     $table->timestamps();
        // });

        // Schema::create('product_basket', function (Blueprint $table) {
            
        //     $table->increments('id');
        //     $table->unsignedInteger('cart_id');
        //     $table->unsignedInteger('product_id');
        //     $table->tinyInteger('count');
        //     $table->tinyInteger('count');

            
        //     $table->foreign('cart_id')->references('id')->on('carts');
        //     $table->foreign('product_id')->references('id')->on('products');

        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
