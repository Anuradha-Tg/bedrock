<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIconToRoomFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('room_feature', function (Blueprint $table) {
            $table->string('icon1')->nullable()->after('feature_name');
            $table->string('icon2')->nullable()->after('icon1');

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
            $table->dropColumn('icon1');
            $table->dropColumn('icon2');

        });
    }
}
