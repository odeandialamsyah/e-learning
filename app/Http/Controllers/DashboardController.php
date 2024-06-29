<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Module;
use App\Models\Quiz;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        $user = auth()->user();
        
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
        $totalUsers = User::count();
        $totalCourses = Course::count();
        $totalModules = Module::count();
        $totalQuizzes = Quiz::count();

        return view('admin.dashboard', compact('courses', 'totalUsers', 'totalCourses', 'totalModules', 'totalQuizzes'));
    }
}
