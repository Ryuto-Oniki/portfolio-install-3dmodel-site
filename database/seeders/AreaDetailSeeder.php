<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('area_details')->insert([
            // 緯度経度は+-000.0000で書く
            ['name' => 'ToKyo_Bay', 'latitude' => '35.5105', 'longitude' => '139.9029'],
            ['name' => 'Kujuu_Mt', 'latitude' => '33.0921', 'longitude' => '131.2387'],
        ]);
    }
}
