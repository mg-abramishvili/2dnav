<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SchemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schemes')->insert([
            [
            'id' => '1',
            'title' => 'Схема 1',
            'image' => '/img/map.png',
            ],
            [
            'id' => '2',
            'title' => 'Схема 2',
            'image' => '/img/map2.png',
            ],
        ]);
    }
}
