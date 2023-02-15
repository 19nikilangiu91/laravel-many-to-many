<?php

use Illuminate\Support\Facades\Route;

// Importo il "MainController".
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home Route
Route::get('/', [MainController::class, 'home'])
    ->name('home');

// Product Route
Route::get('/product', [MainController::class, 'products'])
    ->name('product.home');

// Create Route
Route::get('/product/create', [MainController::class, 'productCreate'])
    ->name('product.create');

// Store Route
Route::post('/product/create', [MainController::class, 'productStore'])
    ->name('product.store');

// Delete Route 
Route::get('/product/delete/{product}', [MainController::class, 'productDelete'])
    ->name('product.delete');

// Edit Route
Route::get('/product/edit/{product}', [MainController::class, 'productEdit'])
    ->name('product.edit');