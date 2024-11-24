<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PreferenceController;

Route::get('/', function () {
    return view('livewire.landing-page');
})->name('home');

// Login Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout Routes
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register Routes
Route::get('/register', function (Request $request) {
    // Ambil preferensi dari query parameter
    $preference = $request->query('preference');

    // Jika preferensi tidak ada, arahkan ke halaman preference
    if (!$preference) {
        return redirect()->route('preference');
    }

    // Tampilkan halaman register dengan preferensi
    return view('auth.register', compact('preference'));
})->name('register');



Route::post('/register', function (Request $request) {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:8',
        'preference' => 'required|in:indoor,outdoor',
    ]);

    // Debugging log
    \Log::info('User data being registered:', $validatedData);

    \App\Models\User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
        'preference' => $validatedData['preference'],
    ]);

    return redirect()->route('login')->with('success', 'Registration successful! Please login.');
});

// Preference Routes
Route::get('/preference', function () {
    return view('auth.preference');
})->name('preference');

Route::post('/preference', function (Request $request) {
    // Validasi input preferensi
    $request->validate(['preference' => 'required|in:indoor,outdoor']);

    // Kirim preferensi sebagai query parameter ke halaman register
    return redirect()->route('register', ['preference' => $request->preference]);
});

// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])
    ->middleware('auth')
    ->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
        Route::post('/preferences', [PreferenceController::class, 'savePreference'])->name('preference.save');
    });
    