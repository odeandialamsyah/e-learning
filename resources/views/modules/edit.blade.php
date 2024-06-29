<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Module</title>
    <!-- Link Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mb-4 py-8">
        <h1 class="text-3xl font-bold mb-2">Edit Module</h1>
        <form action="{{ route('modules.update', ['course' => $course->id, 'module' => $module->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700">Title</label>
                <input type="text" name="title" class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $module->title }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Content</label>
                <textarea name="content" id="content" class="w-full border border-gray-300 rounded px-4 py-2" rows="4">{{ $module->content }}</textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2">Update Module</button>
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
    <a href="javascript:history.go(-1)" class="bg-blue-500 text-white px-4 ml-4 py-2 rounded">Back</a>
</body>
</html>
