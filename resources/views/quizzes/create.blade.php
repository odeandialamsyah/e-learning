<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
    <!-- Link Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Create Quiz</h1>
        <form action="{{ route('quizzes.store', $module->id) }}" method="POST">
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
                <input type="text" name="correct_option" class="w-full border border-gray-300 rounded px-4 py-2" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2">Create Quiz</button>
        </form>
    </div>
</body>
</html>
