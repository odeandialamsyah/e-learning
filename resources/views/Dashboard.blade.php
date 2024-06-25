@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h2 class="text-3xl font-semibold mb-4">My Dashboard</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($courses as $course)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="https://via.placeholder.com/800x400" alt="Course Image" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $course->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($course->description, 100) }}</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('courses.show', $course->id) }}" class="text-indigo-500 hover:text-indigo-600">View Course</a>
                            @if ($course->enrolled)
                                <span class="text-gray-500">Enrolled</span>
                            @else
                                <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600">Enroll</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
