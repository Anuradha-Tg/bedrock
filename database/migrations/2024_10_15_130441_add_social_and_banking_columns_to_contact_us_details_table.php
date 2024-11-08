<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialAndBankingColumnsToContactUsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_us_details', function (Blueprint $table) {
            $table->string('twitter_url')->nullable()->after('map'); // Add twitter_url
            $table->string('youtube_url')->nullable()->after('twitter_url'); // Add youtube_url
            $table->string('banking1')->nullable()->after('youtube_url'); // Add banking1
            $table->string('banking2')->nullable()->after('banking1'); // Add banking2
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_us_details', function (Blueprint $table) {
            $table->dropColumn('twitter_url');
            $table->dropColumn('youtube_url');
            $table->dropColumn('banking1');
            $table->dropColumn('banking2');
        });
    }
}
