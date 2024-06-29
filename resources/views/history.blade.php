@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-4">My History</h1>
    <div class="bg-white shadow-md rounded-lg p-6 mb-4">
        <h2 class="text-2xl font-semibold mb-4">Courses</h2>
        <ul>
            @foreach ($user->courses as $course)
                <li class="mb-2">
                    <h3 class="text-xl font-semibold">{{ $course->title }}</h3>
                    <ul class="ml-4 list-disc">
                        @foreach ($course->modules as $module)
                            <li class="mb-1">
                                <span class="font-semibold">{{ $module->title }}</span>
                                @php
                                    $totalQuizzes = $module->quizzes->count();
                                    $correctAnswers = $user->quizResults->whereIn('quiz_id', $module->quizzes->pluck('id'))->where('is_correct', true)->count();
                                    $score = $totalQuizzes > 0 ? ($correctAnswers / $totalQuizzes) * 100 : 0;
                                @endphp
                                <span class="text-blue-500">Score: {{ number_format($score, 2) }}%</span>
                                <ul class="ml-4 list-disc">
                                    @foreach ($module->quizzes as $quiz)
                                        <li>
                                            <span class="font-semibold">{{ $quiz->question }}</span>
                                            @php
                                                $result = $user->quizResults->where('quiz_id', $quiz->id)->first();
                                            @endphp
                                            @if ($result)
                                                - <span class="{{ $result->is_correct ? 'text-green-500' : 'text-red-500' }}">{{ $result->is_correct ? 'Correct' : 'Incorrect' }}</span>
                                            @else
                                                - <span class="text-gray-500">Not Answered</span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
    <a href="{{route('dashboard')}}" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Back</a>
</div>
@endsection
