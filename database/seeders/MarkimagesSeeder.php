<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MarkimagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mark_images')->insert([
        [
            'title' => 'catlist01.png',
            'image' => '/img/catlist01.png',
        ],
        [
            'title' => 'catlist02.png',
            'image' => '/img/catlist02.png',
        ],
        [
            'title' => 'catlist03.png',
            'image' => '/img/catlist03.png',
        ],
        [
            'title' => 'catlist04.png',
            'image' => '/img/catlist04.png',
        ],
        [
            'title' => 'catlist05.png',
            'image' => '/img/catlist05.png',
        ],
        [
            'title' => 'catlist06.png',
            'image' => '/img/catlist06.png',
        ],
        ]);
    }
}
