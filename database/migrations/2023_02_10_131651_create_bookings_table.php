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
        Schema::create('bookings', function (Blueprint $table) {
            $table->integer('bookings_id', true);
            $table->integer('bookings_status');
            $table->date('booking_date');
            $table->integer('cars_id');
            $table->integer('customers_id');
            $table->date('pickup_date');
            $table->date('return_date');
            $table->string('message', 500);
            $table->integer('status')->comment('0-pending, 1-approved, 2-rejected, 3-completed
');
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
