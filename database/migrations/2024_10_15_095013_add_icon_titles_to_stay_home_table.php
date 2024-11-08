<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIconTitlesToStayHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stay_home', function (Blueprint $table) {
            $table->string('icon1_title', 255)->after('icon3');
            $table->string('icon2_title', 255)->after('icon1_title');
            $table->string('icon3_title', 255)->after('icon2_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stay_home', function (Blueprint $table) {
            $table->dropColumn(['icon1_title', 'icon2_title', 'icon3_title']);
        });
    }
}
