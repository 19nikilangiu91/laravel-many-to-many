<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Importo i model "Category, Product, Typology"
use App\Models\Category;
use App\Models\Product;
use App\Models\Typology;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // 12) Dal model "Product" richiamiamo la "factory" e tramite il foreach richiamiamo ogni "singolo Product ($p)"
    public function run()
    {
        Product::factory()->count(100)->make()->each(function ($p) {

            // Richiamiamo il model "Typology" in ordine casuale e andiamo a prendere il primo elemento casuale. FK
            $typology = Typology::inRandomOrder()->first();

            // Richiamiamo "$p" alla funzione inversa nel Model "Product" e associamo una singola "Typology ($typology)"
            $p->typology()->associate($typology);

            // Salviamo il nuovo elemento
            $p->save();

            // 14) Andiamo a creare un prodotto casuale e andiamo ad associarla nella Tabella Ponte "category_pruduct". N a M
            $categories = Category::inRandomOrder()->limit(rand(1, 5))->get();
            $p->categories()->attach($categories);
        });
    }

}