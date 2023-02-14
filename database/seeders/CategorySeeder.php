<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Importo il model "Category"
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //  6) Vado a creare i dati nel DB nella tabella "Category"
    public function run()
    {
        Category::factory()->count(20)->create();
    }
}