<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('room_id')->unsigned();            
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->string('customer_fullname');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->integer('total_nights');
            $table->decimal('total_price', 8, 2);
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('room_id')->references('id')->on('rooms');
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
}
