@extends('admin.layouts.admin')
@section('content')
<div class=" h-24 bg-white"></div>
<div class="container w-3/4 ml-96 items-center">
    <h1 class="text-3xl font-bold mb-4">All Quizzes</h1>
    <a href="{{ route('quizzes.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2">Create New Quiz</a>
    <table class="w-4/5 bg-white mt-4 border border-gray-300">
        <thead>
            <tr class="bg-gray-200 text-left text-gray-600 uppercase text-sm leading-normal">
                <th class="px-4 py-2 border">Question</th>
                <th class="px-4 py-2 border">Module</th>
                <th class="px-4 py-2 border">Course</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody  class="text-gray-600 text-sm font-light">
            @foreach ($quizzes as $quiz)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $quiz->question }}</td>
                    <td class="px-4 py-2 border">{{ $quiz->module->title }}</td>
                    <td class="px-4 py-2 border">{{ $quiz->module->course->title }}</td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ route('quizzes.show', ['module' => $quiz->module->id, 'quiz' => $quiz->id]) }}" class="bg-blue-500 text-white px-4 py-2 round">View</a>
                        <a href="{{ route('quizzes.edit', $quiz->id) }}" class="bg-green-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection