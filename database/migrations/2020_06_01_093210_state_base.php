<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StateBase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state', function (Blueprint $table) {
            $table->id('id');
            $table->string("name", 255);
            $table->timestamps();
            $table->bigInteger("created_by");
            $table->bigInteger("updated_by");
            $table->tinyInteger("status")->default(1)->comment("1. active, 2. inactive");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('state');
    }
}
