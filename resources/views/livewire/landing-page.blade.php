@extends('layouts.app')  <!-- Menggunakan layout app.blade.php -->

@section('content')
    <div id="landing-page">
        <!-- Navbar -->
        <header class="navbar">
            <div class="navbar-container">
                <h1 class="navbar-title">Bali SmartTrip</h1>
                <div class="navbar-links">
                    <a href="/login" class="btn btn-login">Login</a>
                    <a href="/preference" class="btn btn-register">Register</a>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main-content">
            <h1 class="main-title">
                Selamat Datang di <span class="highlight">Bali SmartTrip!</span>
            </h1>
            <p class="main-description">
                Atur perjalanan Anda di Bali dengan mudah dan cepat.
            </p>
            <button id="startButton" class="btn btn-start">Mulai</button>
        </main>
    </div>

    <!-- Modal -->
    <div id="startModal" class="modal hidden">
        <div class="modal-content">
            <h2 class="modal-title">Apakah Anda Sudah Punya Akun?</h2>
            <div class="modal-buttons">
                <a href="/login" class="btn btn-login">Sudah Punya Akun</a>
                <a href="/preference" class="btn btn-register">Belum Punya Akun</a>
            </div>
        </div>
    </div>
@endsection
