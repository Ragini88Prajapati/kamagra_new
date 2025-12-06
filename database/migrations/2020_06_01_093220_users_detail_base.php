<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersDetailBase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->foreign("users_id")->references('id')->on('users')->onDelete('cascade');;
            $table->string("name", 255);
            $table->string("email_id", 255);
            $table->string("mobile_number", 20);
            $table->string("alt_mobile_number", 20);
            $table->longText("address");
            $table->tinyInteger("floor")->default(1);
            $table->string("landmark", 255);
            $table->string("pincode", 6);
            $table->string("city", 255);
            $table->unsignedBigInteger("state_id");
            $table->foreign('state_id')->references("id")->on('state')->onDelete('cascade');
            $table->timestamps();
            $table->bigInteger("created_by");
            $table->bigInteger("updated_by");
            $table->tinyInteger("status")->default(1)->comment("1.active, 2.inactive");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_detail');
    }
}
