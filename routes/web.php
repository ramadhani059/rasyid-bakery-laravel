<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConsumenController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\CategoryComponent;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
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

Route::get('home', [ConsumenController::class, 'home'])->name('home');
Route::get('produk', [ConsumenController::class, 'produk'])->name('produk');
Route::resource('contact', ContactController::class);

Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');

Route::redirect('/', 'home');

Auth::routes([
    'register' => false
]);



Route::middleware('auth')->group(function() {
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('message', MessageController::class);
    Route::resource('user', UserController::class);
    Route::resource('profile', ProfileController::class);

    Route::get('exportPdf', [ProductController::class, 'exportPdf'])->name('product.exportPdf');
});
