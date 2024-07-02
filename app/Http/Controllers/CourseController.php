<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('users')->get();
        $user = Auth::user();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function enrollUser(Course $course)
    {
        $user = auth()->user();
        $user->courses()->attach($course->id);
        return redirect()->route('dashboard')->with('success', 'Successfully enrolled in the course.');
    }

    public function unenrollUser(Course $course)
    {
        $user = auth()->user();
        $user->courses()->detach($course->id);

        $quizzesToDelete = QuizResult::where('user_id', $user->id)
        ->whereExists(function ($query) use ($course) {
            $query->select('id')
                ->from('quizzes')
                ->whereIn('module_id', function ($query) use ($course) {
                    $query->select('id')
                        ->from('modules')
                        ->where('course_id', $course->id);
                })
                ->whereColumn('quizzes.id', 'quiz_results.quiz_id');
        })->get();
    
        foreach ($quizzesToDelete as $result) {
            $result->delete();
        }

        return redirect()->route('dashboard')->with('success', 'Successfully unenrolled from the course.');
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index');
    }
}
