<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHomeFieldsToExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experience', function (Blueprint $table) {
            $table->string('home_image1')->nullable()->after('image3');
            $table->string('home_image2')->nullable()->after('home_image1');
            $table->string('home_image3')->nullable()->after('home_image2');
            $table->longText('home_title')->nullable()->after('home_image3');
            $table->longText('home_content')->nullable()->after('home_title');
            $table->tinyInteger('checkbox')->default('0')->after('home_content');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('experience', function (Blueprint $table) {
            // Drop the newly added columns
            $table->dropColumn('home_image1');
            $table->dropColumn('home_image2');
            $table->dropColumn('home_image3');
            $table->dropColumn('home_content');
            $table->dropColumn('checkbox');
        });
    }
}
