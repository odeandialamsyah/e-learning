<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\QuizResult;

class QuizController extends Controller
{

    public function index(){
        $quizzes = Quiz::with('module.course')->get();
        return view ('quizzes.index', compact('quizzes'));
    }

    public function create(Module $module)
    {
        $modules = Module::all();
        return view('quizzes.create', compact('modules'));
    }
 
    public function store(Request $request, Module $module)
    {
        $request->validate([
            'quizzes.*.question' => 'required|string|max:255',
            'quizzes.*.option1' => 'required|string|max:255',
            'quizzes.*.option2' => 'required|string|max:255',
            'quizzes.*.option3' => 'required|string|max:255',
            'quizzes.*.option4' => 'required|string|max:255',
            'quizzes.*.correct_option' => 'required|integer|between:0,3',
            'module_id' => 'required|exists:modules,id',
        ]);

        $module = Module::findOrFail($request->module_id);
        $course = $module->course;

        foreach ($request->quizzes as $quizData) {
            $options = [
                $quizData['option1'],
                $quizData['option2'],
                $quizData['option3'],
                $quizData['option4'],
            ];

            Quiz::create([
                'question' => $quizData['question'],
                'options' => json_encode($options),
                'correct_answer' => $quizData['correct_option'],
                'module_id' => $request->module_id,
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Quiz created successfully.');
    }

    public function edit(Quiz $quiz)
    {
        return view('quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'option1' => 'required|string|max:255',
            'option2' => 'required|string|max:255',
            'option3' => 'required|string|max:255',
            'option4' => 'required|string|max:255',
            'correct_option' => 'required|integer|between:0,3',
        ]);

        $options = [
            $request->option1,
            $request->option2,
            $request->option3,
            $request->option4,
        ];

        $quiz->update([
            'question' => $request->question,
            'options' => json_encode($options),
            'correct_answer' => $request->correct_option,
        ]);

        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully.');
  
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully.');
    }

    public function show(Module $module, Quiz $quiz)
    {
        $quiz->load('module.course'); 
    
        return view('quizzes.show', compact( 'quiz'));
    }

    public function evaluate(Request $request, Quiz $quiz, Module $module)
    {
        $user = auth()->user();
        $totalQuizzes = $module->quizzes->count();
        $correctAnswers = 0;

        foreach ($module->quizzes as $quiz) {
            $existingResult = QuizResult::where('user_id', $user->id)
            ->where('quiz_id', $quiz->id)
            ->exists();

            if (!$existingResult) {
                $selectedOption = $request->input("selected_option.{$quiz->id}");
                $isCorrect = $selectedOption == $quiz->correct_answer;

                QuizResult::create([
                    'user_id' => $user->id,
                    'quiz_id' => $quiz->id,
                    'is_correct' => $isCorrect,
                ]);

                if ($isCorrect) {
                    $correctAnswers++;
                }
            } else {
                $request->session()->flash('already_answered_' . $quiz->id, 'You have already answered this quiz.');
            }
        }
    
        $score = ($correctAnswers / $totalQuizzes) * 100;
    
        return view('quizzes.evaluate', compact('module', 'score'));
    }
}
