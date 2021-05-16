<?php

namespace Database\Seeders\urs;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KioskSeeder extends Seeder
{
    public function run()
    {
        DB::table('kiosks')->insert([
            [
            'id' => '1',
            'kiosk' => '1',
            'x' => '132',
            'y' => '207',
            ],
        ]);
    }
}
