<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->integer('cars_id', true);
            $table->integer('cars_status');
            $table->integer('brands_id');
            $table->integer('car_types_id');
            $table->integer('seat_type');
            $table->string('title', 100);
            $table->string('model', 100);
            $table->string('number', 100);
            $table->string('price_per_day', 100);
            $table->integer('mileage_per_litter');
            $table->string('fuel_type', 100);
            $table->string('transmission', 100);
            $table->text('description');
            $table->dateTime('updated_at');
            $table->dateTime('created_at');
            $table->string('image', 100)->nullable();
            $table->string('image_2', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
