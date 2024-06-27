@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-4">My History</h1>
    <h2 class="text-2xl mb-4">Courses</h2>
    <table class="w-full bg-white mb-8">
        <thead>
            <tr>
                <th class="py-2">Course Title</th>
                <th class="py-2">Modules</th>
                <th class="py-2">Quizzes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enrolledCourses as $course)
                <tr>
                    <td class="border px-4 py-2">{{ $course->title }}</td>
                    <td class="border px-4 py-2">
                        @foreach ($course->modules as $module)
                            {{ $module->title }}<br>
                        @endforeach
                    </td>
                    <td class="border px-4 py-2">
                        @foreach ($course->modules as $module)
                            @foreach ($module->quizzes as $quiz)
                                {{ $quiz->question }}<br>
                            @endforeach
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
