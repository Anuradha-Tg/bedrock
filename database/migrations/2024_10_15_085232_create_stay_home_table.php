<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStayHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stay_home', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('image1',255);
            $table->string('image2',255);
            $table->string('image3',255);
            $table->string('icon1',255);
            $table->string('icon2',255);
            $table->string('icon3',255);
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
        Schema::dropIfExists('stay_home');
    }
}

