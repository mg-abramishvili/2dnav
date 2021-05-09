<?php

namespace Database\Seeders\urs;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StoreSeeder extends Seeder
{
    public function run()
    {
        DB::table('stores')->insert([
            [
                'id' => '1',
                'title' => 'Перекресток',
                'logo' => '/img/urs/perekrestok.png',
                'x_01' => '630',
                'y_01' => '97',
                'd_w' => '135',
                'd_h' => '250',
            ],
            [
                'id' => '2',
                'title' => 'Zenden',
                'logo' => '/img/urs/zenden.png',
                'x_01' => '469',
                'y_01' => '271',
                'd_w' => '76',
                'd_h' => '87',
            ],
            [
                'id' => '3',
                'title' => 'М.видео',
                'logo' => '/img/urs/mvideo.png',
                'x_01' => '579',
                'y_01' => '85',
                'd_w' => '186',
                'd_h' => '256',
            ],
        ]);
    }
}
