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

    // 24) Product Route
    public function products()
    {

        $products = Product::all();

        return view('pages.product.home', compact('products'));
    }

    // Create Route
    public function productCreate()
    {
        // 22a) Creo $typologies all'interno della funzione per crearmi anche le tipologie
        $typologies = Typology::all();
        // 25a) Aggiungo tutti i "Category"
        $categories = Category::all();

        return view('pages.product.create', compact('categories', 'typologies'));
    }

    // Store Route
    public function productStore(Request $request)
    {
        // 18) Prova di ricezione dati al submit "Create New Product"
        $data = $request->all();

        // dd($data);

        // 19) Convalido i dati
        $data = $request->validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            // 22c)Inserisco il 'typology_id'
            'typology_id' => 'required|integer',
            // 25c)Inserisco il 'categories'
            'categories' => 'required|array'
        ]);

        // 20b) Dichiaro il $code per non causare rotture con il DB.
        $code = rand(10000, 99999);
        $data['code'] = $code;
        // dd($data);

        // 21) Creo un nuovo "Product"
        $product = Product::make($data);
        // dd($product);

        // 23)Recupero "Typology" dal DB (Richiama il punto 12 (FK) in ProductSeeder)
        $typology = Typology::find($data['typology_id']);
        // Associo l'elemento
        $product->typology()->associate($typology);
        // Salvo l'elemento in DB
        $product->save();

        // 25d)Recupero "Category" dal DB (Richiama il punto 14 (N a M) in ProductSeeder)
        $categories = Category::find($data['categories']);
        $product->categories()->attach($categories);

        return redirect()->route('home', 'product.home');
    }

    // Delete Route 
    public function productDelete(Product $product)
    {

        $product->categories()->sync([]);
        $product->delete();

        return redirect()->route('home');
    }

    // Edit Route
    public function productEdit(Product $product)
    {

        $typologies = Typology::all();
        $categories = Category::all();

        return view('pages.product.edit', compact('product', 'typologies', 'categories'));
    }

    // Update Route
    public function productUpdate(Request $request, Product $product)
    {

        $data = $request->validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'typology_id' => 'required|integer',
            'categories' => 'required|array'
        ]);

        $product->update($data);
        $typology = Typology::find($data['typology_id']);

        $product->typology()->associate($typology);
        $product->save();

        $categories = Category::find($data['categories']);
        $product->categories()->sync($categories);

        return redirect()->route('home');
    }
}