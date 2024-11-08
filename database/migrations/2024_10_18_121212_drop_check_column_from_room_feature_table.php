<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropCheckColumnFromRoomFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('room_feature', function (Blueprint $table) {
            $table->dropColumn('check');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_feature', function (Blueprint $table) {
            $table->tinyInteger('check')->default('0'); // Restores the column
        });
    }
}
