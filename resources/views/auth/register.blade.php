@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center">
    <h1 class="text-2xl font-bold mb-4">Register</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <input type="hidden" name="preference" value="{{ $preference }}">

        <div class="mb-4">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="mb-4">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="mb-4">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="mb-4">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <button type="submit" class="btn">Register</button>
    </form>

    <div class="mt-4">
        <a href="{{ route('login') }}" class="btn-login">Sudah Punya Akun?</a>
    </div>
</div>
@endsection
