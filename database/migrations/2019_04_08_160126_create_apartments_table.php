<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('property_id');
            $table->integer('noOfRooms');
            $table->integer('noOfKitchen');
            $table->integer('noOfWashrooms');
            $table->integer('size');
            $table->string('nearestSchool');
            $table->string('nearestRailway');
            $table->string('nearestBusStop');
            $table->timestamps();


            $table->foreign('property_id')
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
        Schema::dropIfExists('apartments');
    }
}
