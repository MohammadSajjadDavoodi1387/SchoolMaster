<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';

    protected $fillable = [
        'lesson_id',
        'student_id',
        'continuous_assessment1',
        'midterm1',
        'continuous_assessment2',
        'midterm2',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
