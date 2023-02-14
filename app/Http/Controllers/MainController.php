<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 20a) Recupero il Faker
use Faker\Generator as Faker;

// Importo il model "Category"
use App\Models\Category;

// Importo il model "Product"
use App\Models\Product;

// Importo il model "Typology"
use App\Models\Typology;

class MainController extends Controller
{
    // Home Route
    public function home()
    {
        $categories = Category::all();

        return view('pages.home', compact('categories'));
    }

    // Create Route
    public function productCreate()
    {
        // 22a) Creo $typologies all'interno della funzione per crearmi anche le tipologie
        $typologies = Typology::all();

        return view('pages.product.create', compact('typologies'));
    }

    // Store Route
    public function productStore(Request $request)
    {
        // 18) Prova di ricezione dati al submit "Create New Product"
        // $data = $request->all();

        // dd($data);

        // 19) Convalido i dati
        $data = $request->validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            // 22c)Inserisco il 'typology_id'
            'typology_id' => 'required|integer',
        ]);

        // 20b) Dichiaro il $code per non causare rotture con il DB.
        $code = rand(10000, 99999);
        $data['code'] = $code;
        dd($data);

        // 21) Creo un nuovo "Product"
        $product = Product::make($data);
        dd($product);

        // 23)Recupero "Typology" dal DB (Richiama il punto 12 (FK) in ProductSeeder)
        $typology = Typology::find($data['typology_id']);
        // Associo l'elemento
        $product->typology()->associate($typology);
        // Salvo l'elemento in DB
        $product->save();
    }
}