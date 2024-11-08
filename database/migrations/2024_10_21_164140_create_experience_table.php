<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->longText('description');
            $table->string('image1',255);
            $table->string('image2',255);
            $table->string('image3',255);
            $table->string('home_image1')->nullable();
            $table->longText('home_title')->nullable();
            $table->longText('home_content')->nullable();
            $table->tinyInteger('checkbox')->default('0');
            $table->char('status',1);
            $table->tinyInteger('is_delete')->default('0');
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
        Schema::dropIfExists('experience');
    }
}

