<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('carNumber');
            $table->string('category');
            $table->string('brand');
            $table->string('model');
            $table->string('color');
            $table->date('insurance');
            $table->date('technicalVisit');
            $table->date('oilChange');
            $table->string('fuel');
            $table->integer('year');
            $table->string('capacity');
            $table->integer('pricePerDay');
            $table->string('img');
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
        Schema::dropIfExists('cars');
    }
}
