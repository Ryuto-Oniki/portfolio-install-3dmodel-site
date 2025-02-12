<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaDetailObjectModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('area_detail_object_model')->insert([
            ['area_detail_id' => 1, 'object_model_id' => 1],
            ['area_detail_id' => 1, 'object_model_id' => 2],
            ['area_detail_id' => 2, 'object_model_id' => 1],
            ['area_detail_id' => 2, 'object_model_id' => 2],
        ]);
    }
}
