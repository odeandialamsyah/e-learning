@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container mx-auto mt-8">
    <div class="max-w-md mx-auto bg-white p-8 border rounded shadow">
        <h2 class="text-2xl font-semibold mb-6">Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="form-input mt-1 block w-full" required autofocus>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="form-input mt-1 block w-full" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Login</button>
            <span class=" text-gray-700">Belum punya akun? <a href="{{url('register')}}">Daftar</a></span>
        </form>
    </div>
</div>
@endsection
