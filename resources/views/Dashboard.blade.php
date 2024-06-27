@extends('layouts.app')

@section('content')
    <div class="container mx-auto pb-8">
        <h2 class="text-3xl font-semibold mb-4">My Dashboard</h2>
        <a href="{{ route('history') }}" class="text-blue-500 hover:underline">View My History</a>
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($courses as $course)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="https://via.placeholder.com/800x400" alt="Course Image" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $course->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($course->description, 100) }}</p>
                        <div class="flex justify-between items-center">
                            @if ($course->users->contains($user->id))
                                <a href="{{ route('courses.show', $course->id) }}" class="text-blue-500 hover:underline">View Course</a>
                                <form action="{{ route('courses.unenroll', $course->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:underline">Unenroll</button>
                                </form>
                            @else
                                <form action="{{ route('courses.enroll', $course->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="text-blue-500 hover:underline">Enroll</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
