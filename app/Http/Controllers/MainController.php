<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Importo il model "Category"
use App\Models\Category;

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
        return view('pages.product.create');
    }
}