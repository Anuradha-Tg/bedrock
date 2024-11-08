<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_tags', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('page_name');
            $table->longText('page_title');
            $table->longText('description');
            $table->longText('keywords');
            $table->string('og_title');
            $table->string('og_type');
            $table->string('og_tag');
            $table->string('og_url');
            $table->longText('og_image');
            $table->string('og_sitename');
            $table->longText('og_description');
            $table->string('og_email');
            $table->tinyInteger('order');
            $table->char('status',1);
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
        Schema::dropIfExists('meta_tags');
    }
}
