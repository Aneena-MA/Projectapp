<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);
Route::get('/contact', function () {
    return view('contact');
})->middleware(['auth', 'verified'])->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/product', function () {
//     return view('product');
// })->middleware(['auth', 'verified'])->name('product');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
     Route::get('/product', [ProductController::class, 'index'])->name('product');
     Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
     Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
     Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
     Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
     Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
     Route::get('/product-details', [ProductDetailController::class, 'index'])->name('productdetails');
     Route::post('/product-details/store', [ProductDetailController::class, 'store'])->name('productdetail.store');
     Route::get('/product-details/create', [ProductDetailController::class, 'create'])->name('productdetail.create');
     Route::get('/product-details/edit/{id}', [ProductDetailController::class, 'edit'])->name('productdetail.edit');
     Route::post('/product-details/update/{id}', [ProductDetailController::class, 'update'])->name('productdetail.update');
     Route::delete('/product-details/delete/{id}', [ProductDetailController::class, 'delete'])->name('productdetail.delete');
     Route::get('/product-details/show/{id}', [ProductDetailController::class, 'show'])->name('productdetail.show');
     Route::get('/products/{id}/export', [ProductDetailController::class, 'exportExcel'])->name('productdetail.export');

});

require __DIR__.'/auth.php';
