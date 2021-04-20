<?php

namespace Database\Seeders;

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
                'x_01' => '688',
                'y_01' => '221',
            ],
            [
                'id' => '2',
                'title' => 'Zenden',
                'logo' => '/img/urs/zenden.png',
                'x_01' => '505',
                'y_01' => '313',
            ],
        ]);
    }
}
