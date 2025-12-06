<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductBase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 300)->default(null);
            $table->string('name')->default(null);
            $table->string('subtitle')->default(null);
            $table->string('highlights')->default(null);
            $table->string('description', 255);
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brand')->onDelete('CASCADE');
            $table->unsignedTinyInteger('gender_id');
            $table->foreign('gender_id')->references('id')->on('gender')->onDelete('CASCADE');
            $table->string('image')->default(null);
            $table->string('image_path', 255)->default(null);
            $table->integer('mrp')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('price')->default(0);
            $table->timestamps();
            $table->integer('created_by')->nullable()->default(0);
            $table->integer('updated_by')->nullable()->default(0);
            $table->tinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
