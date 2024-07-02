<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id')->withTimestamps();
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function getEnrolledAttribute()
    {
        // Logika untuk mengecek apakah pengguna terdaftar di kursus
        // Misalnya, menggunakan relasi dengan tabel users
        return $this->users()->where('user_id', auth()->id())->exists();
    }

    public function getAverageScoreForUser($user)
    {
        $totalScore = 0;
        $completedModules = 0;

        foreach ($this->modules as $module) {
            $totalQuizzes = $module->quizzes->count();
            if ($totalQuizzes == 0) {
                continue; // Skip modules without quizzes
            }

            $correctAnswers = $user->quizResults->whereIn('quiz_id', $module->quizzes->pluck('id'))->where('is_correct', true)->count();
            $moduleScore = ($correctAnswers / $totalQuizzes) * 100;

            $totalScore += $moduleScore;
            $completedModules++;
        }

        return $completedModules > 0 ? $totalScore / $completedModules : 0;
    }
}
