<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
    
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi data login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Proses autentikasi
        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout user
        $request->session()->invalidate(); // Menghapus sesi
        $request->session()->regenerateToken(); // Menghasilkan ulang token CSRF
        
        return redirect('/'); // Mengarahkan ke halaman landing page setelah logout
    }
    
    public function showRegister()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
    
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi data registrasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'preference' => 'required|in:indoor,outdoor', // Tambahkan validasi preferensi
        ]);
    
        // Simpan user baru ke database
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'preference' => $request->preference, // Simpan preferensi
        ]);
    
        // Redirect ke halaman login setelah registrasi selesai
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
    

}
