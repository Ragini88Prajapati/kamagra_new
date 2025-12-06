<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PgrrOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_gateway_request_response', function (Blueprint $table) {
            $table->string('name', 255)->after('total_amount_paid');

            $table->unsignedBigInteger('users_detail_id')->after('total_amount_paid')->nullable()->default(0);
            $table->foreign('users_detail_id')->references('id')->on('users_detail')->onDelete('cascade');

            $table->unsignedBigInteger('users_id')->after('total_amount_paid')->nullable()->default(0);
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('order', function (Blueprint $table) {
            $table->string('name', 255)->after('total_amount_paid');
            $table->unsignedBigInteger('users_detail_id')->nullable()->default(0)->after('total_amount_paid');
            $table->foreign('users_detail_id')->references('id')->on('users_detail')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_gateway_request_response', function (Blueprint $table) {
            //
        });
    }
}
