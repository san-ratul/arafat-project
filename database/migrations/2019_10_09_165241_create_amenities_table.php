<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmenitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('property_id')->unsigned();
            $table->string('main_features')->nullable();
            $table->string('business_communication')->nullable();
            $table->string('security')->nullable();
            $table->string('other_facilities')->nullable();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('amenities');
    }
}
