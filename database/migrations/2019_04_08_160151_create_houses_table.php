<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('proId');
            $table->integer('noOfRooms');
            $table->integer('noOfKitchen');
            $table->integer('noOfFloors');
            $table->integer('noOfWashrooms');
            $table->integer('size');
            $table->string('swimmingPool');
            $table->string('garden');
            $table->string('nearestSchool');
            $table->string('nearestRailway');
            $table->string('nearestBusStop');
            $table->timestamps();

            $table->foreign('proId')
            ->references('id')
            ->on('properties')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
