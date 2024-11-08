<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStayContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stay_content', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('heading');
            $table->longText('description');
            $table->string('image1',255);
            $table->string('image2',255);
            $table->string('image3',255);
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
        Schema::dropIfExists('stay_content');
    }
}

       