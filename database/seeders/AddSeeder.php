<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adds')->insert([
            [
            'id' => '1',
            'title' => '1',
            'adfile' => '/img/zara.jpg',
            ],
            [
            'id' => '2',
            'title' => '2',
            'adfile' => '/img/zara.jpg',
            ],
        ]);
    }
}
