<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Teacher;
use App\Models\Lesson;
use App\Models\Student;

class GradeController extends Controller
{
    public function index($class, $lesson)
    {
        $students = \App\Models\Student::where('base', $class)->get();
        $lessonInfo = \App\Models\Lesson::find($lesson);
        return view('teacher.createGrade', compact('students', 'class', 'lesson', 'lessonInfo'));
    }

    public function store(Request $request, $class, $lesson)
    {
        $gradesData = $request->input('grades', []);

        foreach ($gradesData as $studentId => $grade) {
            \App\Models\Grade::updateOrCreate(
                [
                    'lesson_id' => $lesson,
                    'student_id' => $studentId,
                ],
                [
                    'continuous_assessment1' => $grade['first_internal'] ?? null,
                    'midterm1' => $grade['first_final'] ?? null,
                    'continuous_assessment2' => $grade['second_internal'] ?? null,
                    'midterm2' => $grade['second_final'] ?? null,
                ]
            );
        }

        return redirect()->route('teacher.index', ['class' => $class, 'lesson' => $lesson])
                        ->with('success', 'نمرات با موفقیت ذخیره شدند.');
    }    
}