<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
        [
            'title' => 'аптека',
        ],
        [
            'title' => 'бытовая техника',
        ],
        [
            'title' => 'одежда',
        ],
        [
            'title' => 'продукты',
        ],
        ]);
    }
}
