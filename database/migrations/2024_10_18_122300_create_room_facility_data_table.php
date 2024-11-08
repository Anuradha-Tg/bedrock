<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomFacilityDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
        Schema::create('room_facility_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->unsignedBigInteger('facility_id');
            $table->foreign('facility_id')->references('id')->on('room_facility')->onDelete('cascade');
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
        Schema::dropIfExists('room_feature_data');
        Schema::table('room_feature_data', function (Blueprint $table) {
            
            $table->dropForeign('room_id');
            $table->dropColumn('room_id');
            $table->dropForeign('facility_id');
            $table->dropColumn('facility_id');
        });
    }
}
