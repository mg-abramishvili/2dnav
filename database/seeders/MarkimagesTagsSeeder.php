<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MarkimagesTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mark_image_tag')->insert([
        [
            'id' => '1',
            'mark_image_id' => '1',
            'tag_id' => '1',
        ],
        [
            'id' => '2',
            'mark_image_id' => '2',
            'tag_id' => '2',
        ],
        [
            'id' => '3',
            'mark_image_id' => '3',
            'tag_id' => '3',
        ],
        [
            'id' => '4',
            'mark_image_id' => '4',
            'tag_id' => '4',
        ],
        [
            'id' => '5',
            'mark_image_id' => '5',
            'tag_id' => '5',
        ],
        [
            'id' => '6',
            'mark_image_id' => '6',
            'tag_id' => '6',
        ],
        ]);
    }
}
