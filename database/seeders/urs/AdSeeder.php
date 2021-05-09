<?php

namespace Database\Seeders\urs;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdSeeder extends Seeder
{
    public function run()
    {
        DB::table('ads')->insert([
            [
            'id' => '1',
            'title' => '1',
            'adfile' => '/img/banner.jpg',
            ],
        ]);
    }
}
