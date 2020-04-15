<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->text('product_image')->nullable();
            $table->text('long_description')->nullable();
            $table->text('sort_description')->nullable();
            $table->string('regular_price')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('width')->nullable();
            $table->string('length')->nullable();
            $table->string('category')->nullable();
            $table->string('tags')->nullable();
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
        Schema::dropIfExists('products');
    }
}
