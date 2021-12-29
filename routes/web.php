<?php

use App\Http\Livewire\Category\Category;
use App\Http\Livewire\Product\Product;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('category');
})->name('dashboard');

Route::group([
    'middleware' => ['auth'],
], function () {

    // CRUD category
    Route::get('/category', Category::class)->name('category');

    // CRUD product
    Route::get('/product', Product::class)->name('product');
});
