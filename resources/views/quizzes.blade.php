@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Create Quiz</h1>
    <form action="{{ route('quizzes.store', $module->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Question</label>
            <input type="text" name="question" class="border rounded w-full py-2 px-3">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Options</label>
            <textarea name="options" class="border rounded w-full py-2 px-3"></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Correct Answer</label>
            <input type="text" name="correct_answer" class="border rounded w-full py-2 px-3">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
    </form>
</div>
@endsection