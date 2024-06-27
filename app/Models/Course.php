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
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id');
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
}
