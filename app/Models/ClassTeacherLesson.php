<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTeacherLesson extends Model
{
    use HasFactory;

    protected $table = 'class_teacher_lessons';

    protected $fillable = [
        'teacher_id',
        'lesson_id',
        'class_base',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
}
