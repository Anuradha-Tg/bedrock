<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderColumnToStayFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stay_features', function (Blueprint $table) {
            $table->integer('order')->after('icon')->default(0); // Adding 'order' column after 'icon'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stay_features', function (Blueprint $table) {
            $table->dropColumn('order'); // Dropping the 'order' column if migration is rolled back
        });
    }
}
