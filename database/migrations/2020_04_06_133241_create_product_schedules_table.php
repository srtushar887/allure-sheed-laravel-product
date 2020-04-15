<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('schedule_name')->nullable();
            $table->string('regular_price')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('width')->nullable();
            $table->string('length')->nullable();
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
        Schema::dropIfExists('product_schedules');
    }
}
