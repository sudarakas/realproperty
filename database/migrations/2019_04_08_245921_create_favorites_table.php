<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('house_id')->nullable();
            $table->unsignedBigInteger('land_id')->nullable();
            $table->unsignedBigInteger('building_id')->nullable();
            $table->unsignedBigInteger('apartment_id')->nullable();
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->timestamps();


            $table->foreign('property_id')
            ->references('id')
            ->on('properties')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('house_id')
            ->references('id')
            ->on('houses')
            ->onDelete('cascade');

            $table->foreign('land_id')
            ->references('id')
            ->on('lands')
            ->onDelete('cascade');

            $table->foreign('building_id')
            ->references('id')
            ->on('buildings')
            ->onDelete('cascade');

            $table->foreign('apartment_id')
            ->references('id')
            ->on('apartments')
            ->onDelete('cascade');

            $table->foreign('warehouse_id')
            ->references('id')
            ->on('warehouses')
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
        Schema::dropIfExists('favorites');
    }
}
