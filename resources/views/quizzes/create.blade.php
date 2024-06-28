<!-- resources/views/quizzes/create.blade.php -->
@extends('admin.layouts.admin')

@section('content')
<div class="h-24"></div>
<div class="container w-3/5 ml-96">
    <h1 class="text-2xl font-bold mb-4">Create Multiple Quizzes</h1>
    <form action="{{ route('quizzes.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Question</label>
            <input type="text" name="question" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Option 1</label>
            <input type="text" name="option1" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Option 2</label>
            <input type="text" name="option2" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Option 3</label>
            <input type="text" name="option3" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Option 4</label>
            <input type="text" name="option4" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Correct Option</label>
            <select name="correct_option" class="w-full border border-gray-300 rounded px-4 py-2" required>
                <option value="0">Option 1</option>
                <option value="1">Option 2</option>
                <option value="2">Option 3</option>
                <option value="3">Option 4</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Module</label>
            <select name="module_id" class="w-full border border-gray-300 rounded px-4 py-2" required>
                @foreach($modules as $module)
                    <option value="{{ $module->id }}">{{ $module->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2">Create Quiz</button>
    </form>
    <a href="javascript:history.go(-1)" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Back</a>
</div>
@endsection
