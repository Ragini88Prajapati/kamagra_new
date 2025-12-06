<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductTypeBase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('product_type', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default(null);
            $table->string('description', 255)->default(null)->nullable();
            $table->timestamps();
            $table->integer('created_by')->nullable()->default(0);
            $table->integer('updated_by')->nullable()->default(0);
            $table->tinyInteger('status')->default(1);
        });


        Schema::table('product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_type_id')->nullable()->after('gender_id');
            $table->foreign('product_type_id')->references('id')->on('product_type')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_type');
    }
}
