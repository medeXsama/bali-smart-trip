<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Method untuk menampilkan halaman dashboard
    public function showDashboard()
    {
        $user = Auth::user(); // Ambil user yang sedang login
        \Log::info('User yang login:', ['id' => $user->id, 'preference' => $user->preference]);
    
        $userPreference = $user->preference;
        return view('dashboard.index', compact('userPreference'));
    }
}
