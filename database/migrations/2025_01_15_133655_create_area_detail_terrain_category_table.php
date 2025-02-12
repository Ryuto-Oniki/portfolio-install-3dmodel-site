<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_detail_terrain_category', function (Blueprint $table) {
            // $table->id();

            $table->foreignId('area_detail_id');
            $table->foreignId('terrain_category_id');
            $table->primary(['area_detail_id', 'terrain_category_id']);

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_detail_terrain_category');
    }
};
