<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaymentGatewayRequestResponseBase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_gateway_request_response', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('user_id');
            $table->string('auto_order_id', 255);
            $table->string('transaction_status', 255);
            $table->string('razorpay_request_json', 500)->default("")->nullable();
            $table->string('razorpay_response_json', 500)->default("")->nullable();
            $table->string('razorpay_order_id')->default("")->nullable();
            $table->longText('request_json')->default("")->nullable();
            $table->longText('response_json')->default("")->nullable();
            $table->float("total_cart_amount")->default(0);
            $table->float("total_amount_paid")->default(0);
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
            $table->tinyInteger('status')->default(2)->comment('1.got_response, 2.request_sent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_gateway_request_response');
    }
}
