<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SchemeSeeder extends Seeder
{
    public function run()
    {
        DB::table('schemes')->insert([
            [
            'id' => '1',
            'title' => 'Этаж 1',
            'image' => '/img/urs/01.png',
            ],
            [
            'id' => '2',
            'title' => 'Этаж 2',
            'image' => '/img/urs/02.png',
            ],
            [
            'id' => '3',
            'title' => 'Этаж 3',
            'image' => '/img/urs/03.png',
            ],
        ]);
    }
}
