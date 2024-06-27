@extends('admin.layouts.admin')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white ml-48 p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-2xl font-semibold mb-6 text-center">Create New Course</h2>

            <form method="POST" action="{{ route('courses.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Course Title</label>
                    <input type="text" id="title" name="title" class="form-input w-full px-3 py-2 rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Course Description</label>
                    <textarea id="description" name="description" rows="4" class="form-textarea w-full px-3 py-2 rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-indigo-500 text-gray-700 px-4 py-2 rounded-lg hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">Create Course</button>
                </div>
            </form>
        </div>
    </div>
@endsection
