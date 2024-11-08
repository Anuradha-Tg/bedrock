<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderColumnToMainSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('main_sliders', function (Blueprint $table) {
            $table->integer('order')->after('mobile_image')->default(0); // Adding 'order' column after 'image'
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
            $table->dropColumn('order'); // Drop the 'order' column if migration is rolled back
        });
    }
}
