<?php

namespace Database\Seeders\urs;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TransportSeeder extends Seeder
{
    public function run()
    {
        DB::table('transports')->insert([
            [
            'id' => '1',
            'text' => '<p><strong>Автобус</strong></p>
                        <ul>
                            <li>4</li>
                            <li>5</li>
                            <li>5A</li>
                        </ul>
                        <hr>
                        <p><strong>Троллейбус</strong></p>
                        <ul>
                            <li>1</li>
                            <li>3</li>
                            <li>7А</li>
                            <li>7Б</li>
                        </ul>',
            ],
        ]);
    }
}
