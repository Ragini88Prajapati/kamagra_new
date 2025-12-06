<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderBase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id('id');

            $table->unsignedBigInteger('users_id')->default(0);
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('auto_order_id');
            $table->string('total_cart_amount');
            $table->string('total_amount_paid');

            $table->unsignedBigInteger('payment_gateway_request_response_id')->default(0);
            $table->foreign('payment_gateway_request_response_id')->references('id')->on('payment_gateway_request_response');
            $table->string("email_id", 255)->nullable();
            $table->string("mobile_number", 20)->nullable();
            $table->string("alt_mobile_number", 20)->nullable();
            $table->longText("address")->nullable();
            $table->tinyInteger("floor")->default(1)->nullable();
            $table->string("landmark", 255)->nullable();
            $table->string("pincode", 6)->nullable();
            $table->string("city", 255)->nullable();
            $table->unsignedBigInteger("state_id")->default(0);
            $table->foreign('state_id')->references("id")->on('state')->onDelete('cascade');

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
        Schema::dropIfExists('order');
    }
}
