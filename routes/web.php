<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Static Route
Route::get('/blogs', function () {
    return "Hello, This is Blog List.";
});

// Dynamic Route
Route::get('/blogs/{id}', function ($id) {
    return "This is blog details - $id";
});

// Naming Route
Route::get('/dashboard', function () {
    return "Welcome from TPP Program!";
})->name('tpp.dashboard');

// Redirect Route
Route::get('/talent', function () {
    return redirect()->route('tpp.dashboard');
});


// Group Route
Route::prefix('backend')->group(function () {
    Route::get('/users', function () {
        return "This is backend users";
    });

    Route::get('/settings', function () {
        return "This is backend settings";
    });

    Route::get('students', function () {
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


Auth::routes(['register' => false]);


Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}/update', [UserController::class, 'update'])->name('users.update');

    Route::post('/users/{id}/delete', [UserController::class, 'delete'])->name('users.delete');

    Route::post('/users/{id}/status', [UserController::class, 'userStatus'])->name('users.status');

    // Roles
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/{id}/update', [RoleController::class, 'update'])->name('roles.update');
    Route::post('/roles/{id}/delete', [RoleController::class, 'delete'])->name('roles.delete');

    // Permissions
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/{id}/update', [PermissionController::class, 'update'])->name('permissions.update');
    Route::post('/permissions/{id}/delete', [PermissionController::class, 'delete'])->name('permissions.delete');
});
