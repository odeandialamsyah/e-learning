@extends('admin.layouts.admin')

@section('content')
<div class="h-24"></div>
<div class="container w-3/5 ml-96">
    <h1 class="text-2xl font-bold mb-4">Create Multiple Quizzes</h1>
    <form action="{{ route('quizzes.store') }}" method="POST" class="mb-4">
        @csrf
        <div id="quiz-container">
            <div class="quiz-item mb-4">
                <label class="block text-gray-700">Question</label>
                <input type="text" name="quizzes[0][question]" class="w-full border border-gray-300 rounded px-4 py-2" required>
                <label class="block text-gray-700">Option 1</label>
                <input type="text" name="quizzes[0][option1]" class="w-full border border-gray-300 rounded px-4 py-2" required>
                <label class="block text-gray-700">Option 2</label>
                <input type="text" name="quizzes[0][option2]" class="w-full border border-gray-300 rounded px-4 py-2" required>
                <label class="block text-gray-700">Option 3</label>
                <input type="text" name="quizzes[0][option3]" class="w-full border border-gray-300 rounded px-4 py-2" required>
                <label class="block text-gray-700">Option 4</label>
                <input type="text" name="quizzes[0][option4]" class="w-full border border-gray-300 rounded px-4 py-2" required>
                <label class="block text-gray-700">Correct Option</label>
                <select name="quizzes[0][correct_option]" class="w-full border border-gray-300 rounded px-4 py-2" required>
                    <option value="0">Option 1</option>
                    <option value="1">Option 2</option>
                    <option value="2">Option 3</option>
                    <option value="3">Option 4</option>
                </select>
            </div>
        </div>
        <button type="button" onclick="addQuiz()" class="bg-green-500 hover:bg-green-600 text-white rounded px-4 py-2">Add Another Quiz</button>
        <div class="mb-4">
            <label class="block text-gray-700">Module</label>
            <select name="module_id" class="w-full border border-gray-300 rounded px-4 py-2" required>
                @foreach($modules as $module)
                    <option value="{{ $module->id }}">{{ $module->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2">Create Quizzes</button>
    </form>
    <a href="javascript:history.go(-1)" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Back</a>
</div>

<script>
    let quizIndex = 1;
    function addQuiz() {
        const quizContainer = document.getElementById('quiz-container');
        const quizItem = document.createElement('div');
        quizItem.className = 'quiz-item mb-4';
        quizItem.innerHTML = `
            <label class="block text-gray-700">Question</label>
            <input type="text" name="quizzes[${quizIndex}][question]" class="w-full border border-gray-300 rounded px-4 py-2" required>
            <label class="block text-gray-700">Option 1</label>
            <input type="text" name="quizzes[${quizIndex}][option1]" class="w-full border border-gray-300 rounded px-4 py-2" required>
            <label class="block text-gray-700">Option 2</label>
            <input type="text" name="quizzes[${quizIndex}][option2]" class="w-full border border-gray-300 rounded px-4 py-2" required>
            <label class="block text-gray-700">Option 3</label>
            <input type="text" name="quizzes[${quizIndex}][option3]" class="w-full border border-gray-300 rounded px-4 py-2" required>
            <label class="block text-gray-700">Option 4</label>
            <input type="text" name="quizzes[${quizIndex}][option4]" class="w-full border border-gray-300 rounded px-4 py-2" required>
            <label class="block text-gray-700">Correct Option</label>
            <select name="quizzes[${quizIndex}][correct_option]" class="w-full border border-gray-300 rounded px-4 py-2" required>
                <option value="0">Option 1</option>
                <option value="1">Option 2</option>
                <option value="2">Option 3</option>
                <option value="3">Option 4</option>
            </select>
        `;
        quizContainer.appendChild(quizItem);
        quizIndex++;
    }
</script>
@endsection
