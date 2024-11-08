<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreImagesToFoodHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('food_home', function (Blueprint $table) {
            $table->string('image4')->nullable()->after('image3');
            $table->string('image5')->nullable()->after('image4');
            $table->string('image6')->nullable()->after('image5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_home', function (Blueprint $table) {
            $table->dropColumn(['image4', 'image5', 'image6']);
        });
    }
}
