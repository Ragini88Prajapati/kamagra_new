<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeliveryStatusBase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_status', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('alternate_text', 255);
            $table->string('description', 500);
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->default(0)->nullable();
            $table->unsignedBigInteger('updated_by')->default(0)->nullable();
            $table->tinyInteger('status')->default(1)->comment('1. active 2. inactive');
        });


        Schema::table('order_product', function (Blueprint $table) {
            $table->unsignedInteger('delivery_status_id')
                ->default(0)
                ->nullable()
                ->after('total_price');
            $table->datetime('delivery_status_update_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_status');
    }
}
