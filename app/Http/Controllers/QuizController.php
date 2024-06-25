<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Module;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function create(Module $module)
    {
        return view('quizzes.create', compact('module'));
    }

    public function store(Request $request, Module $module)
    {
        $request->validate([
            'question' => 'required|string',
            'options' => 'required|array',
            'correct_answer' => 'required|string',
        ]);

        Quiz::create([
            'module_id' => $module->id,
            'question' => $request->question,
            'options' => json_encode($request->options),
            'correct_answer' => $request->correct_answer,
        ]);

        return redirect()->route('modules.show', $module->id);
    }

    public function edit(Quiz $quiz)
    {
        return view('quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $quiz->update($request->all());
        return redirect()->route('modules.show', $quiz->module_id)->with('success', 'Quiz updated successfully.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('modules.show', $quiz->module_id)->with('success', 'Quiz deleted successfully.');
    }

    public function show(Quiz $quiz)
    {
        return view('quizzes.show', compact('quiz'));
    }

    public function evaluate(Request $request, Quiz $quiz)
    {
        $correct = $quiz->correct_answer == $request->answer;
        return view('quizzes.result', compact('correct'));
    }
}
