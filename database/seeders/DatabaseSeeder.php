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
            SetupSeeder::class,

            urs\SchemeSeeder::class,
            urs\MarkimagesSeeder::class,
            urs\MarkimagesTagsSeeder::class,
            urs\TagSeeder::class,
            //urs\StoreSeeder::class,
            urs\AdSeeder::class,            
        ]);
    }
}
