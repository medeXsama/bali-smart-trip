@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="bg-green-500">
        {{ session('success') }}
    </div>
@endif
<div class="flex flex-col items-center">
    <h1 class="text-2xl font-bold mb-4">Login</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="mb-4">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit" class="btn">Login</button>
    </form>
</div>
@endsection
