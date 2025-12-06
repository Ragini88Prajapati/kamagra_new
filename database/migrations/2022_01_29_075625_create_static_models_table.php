<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_models', function (Blueprint $table) {
            $table->id();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('title1')->nullable();
            $table->string('title2')->nullable();
            $table->string('title3')->nullable();
            $table->string('short_description1')->nullable();
            $table->string('short_description2')->nullable();
            $table->string('short_description3')->nullable();
            $table->string('ad_image1')->nullable();
            $table->string('ad_image2')->nullable();
            $table->string('ad_image3')->nullable();
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
        Schema::dropIfExists('static_models');
    }
}
