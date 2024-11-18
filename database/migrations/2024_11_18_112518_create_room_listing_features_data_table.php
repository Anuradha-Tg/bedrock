<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomListingFeaturesDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
        Schema::create('room_listing_features_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->unsignedBigInteger('listing_feature_id');
            $table->foreign('listing_feature_id')->references('id')->on('room_listing_features')->onDelete('cascade');
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
        Schema::dropIfExists('room_listing_features_data');
        Schema::table('room_listing_features_data', function (Blueprint $table) {
            //
            $table->dropForeign('room_id');
            $table->dropColumn('room_id');
            $table->dropForeign('listing_feature_id');
            $table->dropColumn('listing_feature_id');
        });
    }
}
