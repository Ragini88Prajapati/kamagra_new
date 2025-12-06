<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminBannerModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_banner_models', function (Blueprint $table) {
            $table->id();
            $table->string('image_name')->default(null);
            $table->string('title')->default(null);
            $table->string('short_title')->default(null);
            $table->string('url')->default(null);
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
        Schema::dropIfExists('admin_banner_models');
    }
}
