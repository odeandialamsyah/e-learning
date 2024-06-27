@extends('admin.layouts.admin')

@section('content')

<div class=" h-24 bg-white"></div>
<div class="container w-3/4 ml-96 items-center">
    <h1 class="text-3xl font-bold mb-4">All Modules</h1>
    <div class="mb-4">
        <a href="{{ route('modules.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2">Create New Module</a>
    </div>
    <table class="w-4/5 bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-left text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6">Module Title</th>
                <th class="py-3 px-6">Course</th>
                <th class="py-3 px-6 text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($modules as $module)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $module->title }}</td>
                    <td class="py-3 px-6">{{ $module->course->title }}</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('modules.show', ['course' => $module->course->id, 'module' => $module->id]) }}" class="bg-blue-500 text-white px-4 py-2 round">View</a>
                        <a href="{{ route('modules.edit', ['course' => $module->course->id, 'module' => $module->id]) }}" class="bg-green-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('modules.destroy', ['course' => $module->course->id, 'module' => $module->id]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
