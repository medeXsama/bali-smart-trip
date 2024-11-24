@extends('layouts.app')

@section('content')
<header class="bg-white shadow">
    <div class="container mx-auto px-4 py-6 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Welcome to the Dashboard</h1>
            <p class="text-gray-600">Explore recommendations based on your preferences.</p>
        </div>
        <button id="logoutButton" class="btn-logout">Logout</button>
    </div>
</header>

<!-- Modal untuk Preferensi Spesifik -->
<div id="dashboardPreferenceModal" class="modal hidden">
    <div class="modal-content">
        <h2 class="modal-title text-xl font-semibold text-gray-800">Apa minat spesifik Anda?</h2>
        <p class="text-sm text-gray-600 mb-4">Pilih jenis wisata yang sesuai dengan preferensi Anda.</p>

        <!-- Card Pilihan -->
        <div class="grid grid-cols-2 gap-4">
            @if ($userPreference === 'outdoor')
                <div class="card">
                    <div class="card-content">
                        <img src="/images/beach.jpg" alt="Pantai" class="w-full h-24 object-cover rounded">
                        <h3 class="text-lg font-bold text-gray-800 mt-2">Pantai</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <img src="/images/zoo.jpg" alt="Kebun Binatang" class="w-full h-24 object-cover rounded">
                        <h3 class="text-lg font-bold text-gray-800 mt-2">Kebun Binatang</h3>
                    </div>
                </div>
            @elseif ($userPreference === 'indoor')
                <div class="card">
                    <div class="card-content">
                        <img src="/images/mall.jpg" alt="Mall" class="w-full h-24 object-cover rounded">
                        <h3 class="text-lg font-bold text-gray-800 mt-2">Mall</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <img src="/images/museum.jpg" alt="Museum" class="w-full h-24 object-cover rounded">
                        <h3 class="text-lg font-bold text-gray-800 mt-2">Museum</h3>
                    </div>
                </div>
            @else
                <p class="text-gray-600">Preferensi Anda belum diatur.</p>
            @endif
        </div>

        <!-- Tombol Selesai -->
        <button id="savePreferences" class="btn mt-4">Selesai</button>
    </div>
</div>

<!-- Modal Konfirmasi Logout -->
<div id="logoutModal" class="modal hidden">
    <div class="modal-content">
        <h2 class="modal-title text-xl font-semibold text-gray-800">Konfirmasi Logout</h2>
        <p class="text-sm text-gray-600 mb-4">Apakah Anda yakin ingin logout?</p>
        <div class="modal-buttons">
            <button id="confirmLogout" class="btn">Ya</button>
            <button id="cancelLogout" class="btn-login">Batal</button>
        </div>
    </div>
</div>

@endsection