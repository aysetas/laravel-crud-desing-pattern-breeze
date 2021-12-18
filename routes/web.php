<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
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
    return view('welcome');
});

require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/product/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('/product/trashed', [ProductController::class, 'trashed'])->name('product.trashed');
    Route::resource('product', ProductController::class);
    Route::get('/search', [ProductController::class, 'index'])->name('product.search');

    Route::get('/category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('/category/trashed', [CategoryController::class, 'trashed'])->name('category.trashed');
    Route::resource('category', CategoryController::class);

});
