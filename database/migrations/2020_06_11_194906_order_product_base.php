<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderProductBase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id('id');

            $table->unsignedBigInteger('order_id')->comment("This is id of order table and not order_id which is autogenrated");
            $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');

            $table->unsignedBigInteger('user_cart_id');
            $table->foreign('user_cart_id')->references('id')->on('user_cart')->onDelete('cascade');

            $table->integer('quantity');
            $table->integer('price');
            $table->integer('total_price');

            $table->timestamps();
            $table->tinyInteger('status')->default(1)->comment('1.active, 2.inactive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
