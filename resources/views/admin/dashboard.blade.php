@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h2 class="text-3xl font-semibold mb-4">Admin Dashboard</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card untuk setiap kursus -->
            @foreach ($courses as $course)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="https://via.placeholder.com/800x400" alt="Course Image" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $course->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($course->description, 100) }}</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('courses.show', $course->id) }}" class="text-indigo-500 hover:text-indigo-600">View Course</a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
