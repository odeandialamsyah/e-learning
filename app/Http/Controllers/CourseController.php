<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
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

    public function enrollUser(Request $request, $courseId)
    {
        $course = Course::findOrFail($courseId);
        $userId = $request->input('user_id');

        if (!$course->users()->where('user_id', $userId)->exists()) {
            $course->users()->attach($userId);
        }

        return redirect()->route('dashboard')->with('success', 'User enrolled successfully.');
    }

    public function unenrollUser(Request $request, $courseId)
    {
        $course = Course::findOrFail($courseId);
        $userId = $request->input('user_id');

        if ($course->users()->where('user_id', $userId)->exists()) {
            $course->users()->detach($userId);
        }

        return redirect()->route('dashboard')->with('success', 'User unenrolled successfully.');
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
