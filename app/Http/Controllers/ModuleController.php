<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Module;

class ModuleController extends Controller
{
    public function create(Course $course)
    {
        return view('modules.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $course->modules()->create($request->all());

        return redirect()->route('courses.show', $course->id);
    }

    public function show(Course $course, Module $module)
    {
        $module->load('quizzes');
        return view('modules.show', compact('course', 'module'));
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

        return redirect()->route('courses.show', $course->id);
    }

    public function destroy(Course $course, Module $module)
    {
        $module->delete();
        return redirect()->route('courses.show', $course->id);
    }
}
