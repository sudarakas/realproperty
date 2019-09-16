<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('property_id');
            $table->string('agreement');
            $table->integer('noOfFloors');
            $table->string('lift');
            $table->string('carPark');
            $table->integer('floorSize');
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
        Schema::dropIfExists('buildings');
    }
}
