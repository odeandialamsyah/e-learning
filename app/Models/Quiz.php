<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'question', 'options', 'correct_answer', 'module_id',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function results()
    {
        return $this->hasMany(QuizResult::class);
    }

    public function isAnswer($option)
    {
        return $this->options[$this->correct_answer] === $option;
    }

    public function getCompletedAttribute($user)
    {
        if (!$user) {
            return false;
        }
        return $user->quizResults()->where('quiz_id', $this->id)->exists();
    }
}
