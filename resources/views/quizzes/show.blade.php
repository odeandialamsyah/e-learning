<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Show Quiz</h1>
        <div class="bg-white shadow mb-4 rounded p-4">
            <p class="font-semibold">{{ $quiz->question }}</p>
            <ul class="list-disc list-inside mt-4">
                @foreach(json_decode($quiz->options) as $option)
                    <li>{{ $option }}</li>
                @endforeach
            </ul>
        </div>
        <a href="javascript:history.go(-1)" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Back</a>
    </div>
</body>
</html>
