<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $courses = Course::all();

        return view('dashboard', compact('user', 'courses'));
    }

    public function history()
    {
        $user = Auth::user();
        $enrolledCourses = $user->courses;

        return view('history', compact('user', 'enrolledCourses'));
    }

    public function admin()
    {
        // Ambil semua kursus untuk ditampilkan di dashboard admin
        $courses = Course::all();

        return view('admin.dashboard', compact('courses'));
    }
}
