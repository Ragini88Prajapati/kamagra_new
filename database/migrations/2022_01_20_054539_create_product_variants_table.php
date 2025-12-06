<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable()->default(0);
            $table->integer('count')->nullable()->default(0);
            $table->string('unit_type')->nullable();
            $table->string('price_per_pills')->nullable()->default(0);
            $table->integer('price')->nullable()->default(0);
            $table->string('offer')->nullable();
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
        Schema::dropIfExists('product_variants');
    }
}
