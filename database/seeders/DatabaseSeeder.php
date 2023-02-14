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
    public function run()
    {
        $this->call([

            CategorySeeder::class,
        ]);
    }
}