<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function getCompletedAttribute($user)
    {
        if (!$user) {
            return false; // or throw an exception
        }
        return $this->quizzes->every(function ($quiz) use ($user) {
            return $user->quizResults()->where('quiz_id', $quiz->id)->exists();
        });
    }   
}
