@extends('layouts.app')

@section('title', 'Module')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">{{ $module->title }}</h1>
    <div class="bg-white shadow rounded p-4">
        <p>{{ $module->content }}</p>
    </div>
    <div class="mt-4">
        <h2 class="text-xl font-semibold">Quiz</h2>
        @foreach($module->quizzes as $quiz)
            <div class="bg-white shadow rounded p-4 mt-2">
                <p>{{ $quiz->question }}</p>
                <form action="{{ route('quizzes.evaluate', $quiz->id) }}" method="POST">
                    @csrf
                    <div>
                        @foreach(json_decode($quiz->options) as $option)
                            <label class="inline-flex items-center mt-2">
                                <input type="radio" name="answer" value="{{ $option }}" class="form-radio h-5 w-5 text-blue-600">
                                <span class="ml-2">{{ $option }}</span>
                            </label>
                        @endforeach
                    </div>
                    <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Submit Answer</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
