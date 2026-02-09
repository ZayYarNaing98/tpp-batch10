<?php

use Illuminate\Support\Facades\Route;

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
