<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $table = 'lessons';

    protected $fillable = [
        'titleFa',
        'titleEn',
        'producer',
        'type',
        'code',
        'base',
        'isActive'
    ];

    public $timestamps = true;
    protected $guarded = [];

    public function classTeacherLessons()
    {
        return $this->hasMany(ClassTeacherLesson::class, 'lesson_id');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, 'lesson_id');
    }
}
