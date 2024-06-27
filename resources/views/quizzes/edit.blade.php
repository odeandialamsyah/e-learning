<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Edit Quiz</h1>
        <form action="{{ route('quizzes.update', $quiz->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700">Question</label>
                <input type="text" name="question" class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $quiz->question }}" required>
            </div>
            @php
                $options = json_decode($quiz->options, true);
            @endphp
            <div class="mb-4">
                <label class="block text-gray-700">Option 1</label>
                <input type="text" name="option1" class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $options[0] }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Option 2</label>
                <input type="text" name="option2" class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $options[1] }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Option 3</label>
                <input type="text" name="option3" class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $options[2] }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Option 4</label>
                <input type="text" name="option4" class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $options[3] }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Correct Option</label>
                <select name="correct_option" class="w-full border border-gray-300 rounded px-4 py-2" required>
                    <option value="0" @if($quiz->correct_answer == 0) selected @endif>Option 1</option>
                    <option value="1" @if($quiz->correct_answer == 1) selected @endif>Option 2</option>
                    <option value="2" @if($quiz->correct_answer == 2) selected @endif>Option 3</option>
                    <option value="3" @if($quiz->correct_answer == 3) selected @endif>Option 4</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2">Update Quiz</button>
        </form>
    </div>
</body>
</html>
