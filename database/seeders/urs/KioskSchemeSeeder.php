<?php

namespace Database\Seeders\urs;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KioskSchemeSeeder extends Seeder
{
    public function run()
    {
        DB::table('kiosk_scheme')->insert([
            [
            'id' => 1,
            'kiosk_id' => 1,
            'scheme_id' => 1,
            ],
        ]);
    }
}
