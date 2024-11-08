<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameImageAndAddMobileImageToMainSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('main_sliders', function (Blueprint $table) {
            // Rename the 'image' column to 'desktop_image'
            $table->renameColumn('image', 'desktop_image');
            
            // Add the 'mobile_image' column after 'desktop_image'
            $table->string('mobile_image', 255)->after('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('main_sliders', function (Blueprint $table) {
            // Reverse the 'mobile_image' column addition
            $table->dropColumn('mobile_image');
            
            // Rename 'desktop_image' back to 'image'
            $table->renameColumn('desktop_image', 'image');
        });
    }
}
