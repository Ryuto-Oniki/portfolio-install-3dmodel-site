<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaDetailRegionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('area_detail_region_category')->insert([
            ['area_detail_id' => 1, 'region_category_id' => 1],
            ['area_detail_id' => 1, 'region_category_id' => 2],
            ['area_detail_id' => 2, 'region_category_id' => 1],
            ['area_detail_id' => 2, 'region_category_id' => 2],
        ]);
    }
}
