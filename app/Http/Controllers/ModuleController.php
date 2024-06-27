<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Module;

class ModuleController extends Controller
{
    public function create(Course $course)
    {
        $courses = Course::all();
        return view('modules.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'course_id' => 'required|exists:courses,id',
        ]);

        Module::create($request->all());

        return redirect()->route('modules.index')->with('success', 'Module created successfully.');
    }

    public function show(Course $course, Module $module)
    {
        $module->load('quizzes');
        return view('modules.show', compact('course', 'module'));
    }

    public function index()
    {
        $modules = Module::with('course')->get();
        return view('modules.index', compact('modules'));
    }

    public function edit(Course $course, Module $module)
    {
        return view('modules.edit', compact('course', 'module'));
    }

    public function update(Request $request, Course $course, Module $module)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $module->update($request->all());

        return redirect()->route('modules.index', ['course' => $course->id]);
    }

    public function destroy(Course $course, Module $module)
    {
        $module->delete();
        return redirect()->route('modules.index', $course->id);
    }
}
