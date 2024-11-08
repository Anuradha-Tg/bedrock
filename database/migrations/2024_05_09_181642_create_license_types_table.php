<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('license_types', function (Blueprint $table) {
            $table->id()->unique();
            $table->tinyInteger('section_type')->comment('1 = Watch keeping certificate, 2 = Other STCW certificates, 3 = Other mandatory');
            $table->tinyInteger('section')->comment('0 = License, 1 = Reg V/1, 2 = Other, 4 = Reg 1, 5 = Reg VI/1, 6 = Reg VI/2')->nullable();
            $table->string('licence_name');
            $table->integer('display_order');
            $table->char('status',1)->default('Y');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license_types');
    }
};
