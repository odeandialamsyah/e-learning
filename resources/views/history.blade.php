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
            @foreach (auth()->user()->courses as $course)
                <tr>
                    <td class="border px-4 py-2">{{ $course->title }}</td>
                    <td class="border px-4 py-2">
                        @php
                            $completedModules = $course->modules->filter(function ($module) {
                                return $module->quizzes->every(function ($quiz) {
                                    return $quiz->results->where('user_id', auth()->id())->isNotEmpty();
                                });
                            });
                        @endphp
                        {{ $completedModules->count() }} / {{ $course->modules->count() }}
                    </td>
                    <td class="border px-4 py-2">
                        @php
                            $completedQuizzes = $course->modules->flatMap->quizzes->filter(function ($quiz) {
                                return $quiz->results->where('user_id', auth()->id())->isNotEmpty();
                            });
                        @endphp
                        {{ $completedQuizzes->count() }} / {{ $course->modules->flatMap->quizzes->count() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
