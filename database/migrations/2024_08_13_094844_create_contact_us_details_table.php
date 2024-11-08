<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us_details', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('contact_no', 12);
            $table->string('hotline', 12);
            $table->string('email');
            $table->string('address');
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->longText('map')->nullable();
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
        Schema::dropIfExists('contact_us_details');
    }
}
