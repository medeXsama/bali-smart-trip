@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center">
    <h1 class="text-2xl font-bold mb-4">Pilih Preferensi Trip</h1>
    <form action="{{ route('preference') }}" method="POST">
        @csrf
        <div class="card-button-container">
            <!-- Card Button 1 -->
            <label class="card-button">
                <input type="radio" name="preference" value="indoor" required>
                <div class="card-content">
                    <h2>Saya suka wisata Indoor!</h2>
                    <p>Misalnya: museum, galeri seni, atau theme park.</p>
                </div>
            </label>
            
            <!-- Card Button 2 -->
            <label class="card-button">
                <input type="radio" name="preference" value="outdoor" required>
                <div class="card-content">
                    <h2>Saya lebih menyukai wisata Outdoor!</h2>
                    <p>Misalnya: hiking, pantai, atau taman.</p>
                </div>
            </label>
        </div>        
        <button type="submit" class="btn mt-4">Lanjut ke Registrasi</button>
    </form>
</div>
@endsection
