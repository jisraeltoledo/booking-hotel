<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('room_name');
            $table->bigInteger('hotel_id')->unsigned ();
            $table->bigInteger('room_type')->unsigned ();
            $table->foreign('hotel_id')->references('id')->on('hotel_details');
            $table->foreign('room_type')->references('id')->on('room_types');
            $table->string('room_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
