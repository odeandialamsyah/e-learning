<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluate Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Quiz Evaluation</h1>
        <div class="bg-white shadow rounded p-4 mb-4">
            <h2 class="text-xl font-semibold">Score: {{ $score }}%</h2>
            @foreach($module->quizzes as $quiz)
                <div class="mt-4">
                    <p>{{ $quiz->question }}</p>
                    <ul class="list-disc list-inside mt-2">
                        @foreach(json_decode($quiz->options) as $index => $option)
                            <li @if($index == $quiz->correct_answer) class="font-bold text-green-600" @endif>{{ $option }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
        <a href="{{ route('courses.show', $module->course->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Back to Modules</a>
    </div>
</body>
</html>
