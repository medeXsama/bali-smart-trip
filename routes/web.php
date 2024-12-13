<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BigQueryController;

Route::get('/', function () {
    return view('index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/generate', function () {
    return view('generate');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::post('/add-user', [BigQueryController::class, 'insertDataToBigQuery']);
Route::post('/login', [BigQueryController::class, 'loginUser'])->name('login.user');
Route::get('/get-types', [BigQueryController::class, 'getTypes']);
Route::get('/get-keywords', [BigQueryController::class, 'getKeywords']);

