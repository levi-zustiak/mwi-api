<?php

namespace Database\Seeders;

use Database\Seeders\ContactSeeder;
use Database\Seeders\ContentSeeder;
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
            ContactSeeder::class,
            ContentSeeder::class
        ]);
    }
}
