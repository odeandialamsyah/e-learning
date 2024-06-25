@extends('admin.layouts.admin')

@section('title', 'Courses')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Courses</h1>
    <a href="{{ route('courses.create') }}" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Create New Course</a>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($courses as $course)
            <div class="p-4 bg-white shadow rounded">
                <h2 class="text-xl font-semibold">{{ $course->title }}</h2>
                <p>{{ $course->description }}</p>
                <a href="{{ route('courses.show', $course->id) }}" class="text-blue-500">View Course</a>
                <a href="{{ route('courses.edit', $course->id) }}" class="text-yellow-500">Edit</a>
                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
