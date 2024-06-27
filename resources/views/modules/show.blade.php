@extends('layouts.app')

@section('title', 'Module')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">{{ $module->title }}</h1>
    <div class="bg-white shadow rounded p-4">
        <p>{{!! $module->content !!}}</p>
    </div>
    <div class="mt-4">
        @if ($module->quizzes->isEmpty())
            <p></p>
        @else
            <h2 class="text-xl font-semibold">Quiz</h2>
            @foreach($module->quizzes as $quiz)
                <div class="bg-white shadow rounded p-4 mt-2">
                    <p>{{ $quiz->question }}</p>
                    <form action="{{ route('quizzes.evaluate', $quiz->id) }}" method="POST">
                        @csrf
                        <div>
                            @foreach(json_decode($quiz->options) as $index => $option)
                                <label class="inline-flex items-center mt-2">
                                    <input type="radio" name="selected_option" value="{{ $index }}" class="form-radio h-5 w-5 text-blue-600">
                                    <span class="ml-2">{{ $option }}</span>
                                </label>
                            @endforeach
                        </div>
                        <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Submit Answer</button>
                    </form>
                </div>
            @endforeach
        @endif
    </div>
    <a href="javascript:history.go(-1)" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Back</a>
</div>
<div class="h-56"></div>
@endsection
