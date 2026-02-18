<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});


// Static Route
Route::get('/blogs', function(){
    return "Hello, This is Blog List.";
});

// Dynamic Route
Route::get('/blogs/{id}', function($id){
    return "This is blog details - $id";
});

// Naming Route
Route::get('/dashboard', function(){
    return "Welcome from TPP Program!";
})->name('tpp.dashboard');

// Redirect Route
Route::get('/talent', function(){
    return redirect()->route('tpp.dashboard');
});


// Group Route
Route::prefix('backend')->group(function(){
    Route::get('/users', function(){
        return "This is backend users";
    });

    Route::get('/settings', function(){
        return "This is backend settings";
    });

    Route::get('students', function(){
        return redirect()->route('tpp.dashboard');
    });
});


// Laravel View
// Route::get('/articles', function(){
//     return view('articles.index');
// });


// Laravel Controller
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');

Route::post('/categories/{id}/delete', [CategoryController::class, 'delete'])->name('categories.delete');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');

Route::post('/products/{id}/delete', [ProductController::class, 'delete'])->name('products.delete');

