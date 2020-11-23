<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ads')->insert([
            [
            'id' => '1',
            'title' => '1',
            'adfile' => '/img/slide.jpg',
            ],
            [
            'id' => '2',
            'title' => '2',
            'adfile' => '/img/slide.jpg',
            ],
        ]);
    }
}
