<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdminUserBase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string("mobile_number", 20)->nullable();
            $table->string("password");
            $table->timestamps();
            $table->bigInteger("created_by")->default(0);
            $table->bigInteger("updated_by")->default(0);
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
        Schema::dropIfExists('admin_user');
    }
}
