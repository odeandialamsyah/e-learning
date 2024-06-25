@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container mx-auto mt-8">
    <div class="max-w-md mx-auto bg-white p-8 border rounded shadow">
        <h2 class="text-2xl font-semibold mb-6">Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="form-input mt-1 block w-full">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="form-input mt-1 block w-full">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="form-input mt-1 block w-full">
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-input mt-1 block w-full" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Register</button>
            <span class=" text-gray-700">Sudah punya akun? <a href="{{ url('login')}}">login</a></span>
        </form>
    </div>
</div>
@endsection
