@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-3xl font-semibold mb-4">{{ $course->title }}</h2>
            <p class="text-gray-600 mb-6">{{ $course->description }}</p>

            <h3 class="text-2xl font-semibold mb-4">Modules</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($course->modules as $module)
                    <div class="bg-gray-100 rounded-lg shadow-md p-4">
                        <h4 class="text-lg font-semibold mb-2">{{ $module->title }}</h4>
                        <p class="text-gray-600">{{ $module->content }}</p>
                    </div>
                @empty
                    <p class="text-gray-600">No modules found for this course.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
