<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $courses = $user->courses;

        return view('dashboard', compact('courses'));
    }

    public function admin()
    {
        // Ambil semua kursus untuk ditampilkan di dashboard admin
        $courses = Course::all();

        return view('admin.dashboard', compact('courses'));
    }
}
