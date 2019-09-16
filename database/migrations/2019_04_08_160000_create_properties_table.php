<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('type');
            $table->double('amount');
            $table->string('city');
            $table->string('postalCode');
            $table->string('province');
            $table->text('description');
            $table->string('images');
            $table->string('availability');
            $table->string('contactNo');
            $table->string('contatctEmail');
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
        Schema::dropIfExists('properties');
    }
}
