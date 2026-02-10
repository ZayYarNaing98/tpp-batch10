<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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
