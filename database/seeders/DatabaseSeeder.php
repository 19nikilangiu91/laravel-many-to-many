<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    // 7) Richiamo il "CategorySeeder" nel DBSeeder
    // 9) Richiamo il "TypologySeeder" nel DBSeeder
    // 13) Richiamo il "ProductSeeder" nel DBSeeder
    public function run()
    {
        $this->call([

            CategorySeeder::class,
            TypologySeeder::class,
            ProductSeeder::class,
        ]);
    }
}