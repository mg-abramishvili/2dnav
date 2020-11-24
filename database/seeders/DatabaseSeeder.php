<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            TagSeeder::class,
            SetupSeeder::class,
            SchemeSeeder::class,
            MarkimagesSeeder::class,
            MarkimagesTagsSeeder::class,
            AdSeeder::class,
            AddSeeder::class,
        ]);
    }
}
