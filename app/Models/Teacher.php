<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Teacher extends Model
{
    use HasFactory;
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'licence',
        'phone',
        'email',
        'address',
        'avatar',
        'isActive'
    ];
        public function majors()
    {
        return $this->hasMany(Major::class);
    }

        public function classTeacherLessons()
    {
        return $this->hasMany(ClassTeacherLesson::class, 'teacher_id');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, 'teacher_id');
    }

}
