<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHomeFieldsToPromotionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promotion', function (Blueprint $table) {
            $table->string('home_image1')->nullable()->after('image');
            $table->longText('home_title')->nullable()->after('home_image1');
            $table->longText('home_content')->nullable()->after('home_title');
            $table->tinyInteger('checkbox')->default(0)->after('home_content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promotion', function (Blueprint $table) {
            $table->dropColumn(['home_image1', 'home_title', 'home_content', 'checkbox']);
        });
    }
}
