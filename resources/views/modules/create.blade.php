<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Module</title>
    <!-- Link Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Create Module</h1>
        <form action="{{ route('modules.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Title</label>
                <input type="text" name="title" class="w-full border border-gray-300 rounded px-4 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Content</label>
                <textarea name="content" id="content" class="w-full border border-gray-300 rounded px-4 py-2" rows="4"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Course</label>
                <select name="course_id" class="w-full border border-gray-300 rounded px-4 py-2" required>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2">Create Module</button>
        </form>
    </div>
    <script>
        CKEDITOR.replace('content');
    </script>
</body>
</html>
