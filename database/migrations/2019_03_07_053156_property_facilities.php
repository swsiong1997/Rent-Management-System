<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PropertyFacilities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propertyFacilities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->foreign('property_id')->references('id')->on('properties');
            $table->integer('facility_id');
            $table->foreign('facility_id')->references('id')->on('facilities');
            $table->integer('quantity_of_facilties');
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
        Schema::dropIfExists('propertyFacilities');
    }
}
