<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SetupSeeder extends Seeder
{
    public function run()
    {
        DB::table('setups')->insert([
            [
                'id' => '1',
                'logo' => '/img/logo.svg',
                'color' => '#009387',
            ],
        ]);
    }
}
