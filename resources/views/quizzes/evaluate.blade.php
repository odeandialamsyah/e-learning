<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluate Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Quiz Evaluation</h1>
        <div class="bg-white shadow rounded p-4">
            <p class="font-semibold">{{ $quiz->question }}</p>
            <ul class="list-disc list-inside mt-4">
                @foreach(json_decode($quiz->options) as $index => $option)
                    <li @if($index == $quiz->correct_answer) class="font-bold text-green-600" @endif>{{ $option }}</li>
                @endforeach
            </ul>
            @if($isCorrect)
                <p class="mt-4 text-green-600 font-semibold">Correct!</p>
            @else
                <p class="mt-4 text-red-600 font-semibold">Incorrect. The correct answer is "{{ json_decode($quiz->options)[$quiz->correct_answer] }}"</p>
            @endif
        </div>
        <a href="{{ route('courses.show', ['course' => $quiz->module->course->id]) }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Back to Moduls</a>
    </div>
</body>
</html>
