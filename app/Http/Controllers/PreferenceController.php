<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function showPreference()
    {
        // Jika preferensi sudah diatur, redirect ke register
        // if (session('preference_set')) {
        //     return redirect()->route('register');
        // }
        return view('preference');
    }

    public function savePreference(Request $request)
    {
        // Validasi preferensi
        $request->validate([
            'preference' => 'required|in:indoor,outdoor',
        ]);
    
        // Redirect ke halaman register dengan preferensi sebagai query parameter
        return redirect()->route('register', ['preference' => $request->preference]);
    }
    
}
