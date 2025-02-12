<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObjectModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('object_models')->insert([
            ['name' => 'Tree01', 'modelname' => 'dead_tree_trunk_02_2k.zip'],
            ['name' => 'Rock01', 'modelname' => 'boulder_01_4k.fbx.zip'],
        ]);
    }
}
