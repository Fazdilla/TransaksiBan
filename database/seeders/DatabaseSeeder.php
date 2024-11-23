<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BanSeeder;
use Database\Seeders\CabangSeeder;
use Database\Seeders\KendaraanSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BanSeeder::class,
            CabangSeeder::class,
            KendaraanSeeder::class,
        ]);
    }
}
