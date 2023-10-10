<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmlandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmlands', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('additionalinformation');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('companyname');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->text('farmlandLat');
            $table->text('farmlandLng');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farmlands');
    }
}
