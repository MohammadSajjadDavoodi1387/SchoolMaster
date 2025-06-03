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
        $students = Student::where('base', $class)->get();
        $lessonInfo = Lesson::find($lesson);

        $studentIds = $students->pluck('id');

        $existingGrades = Grade::where('lesson_id', $lesson)
                                ->whereIn('student_id', $studentIds)
                                ->get()
                                ->keyBy('student_id');

        return view('teacher.createGrade', compact('students', 'class', 'lesson', 'lessonInfo', 'existingGrades'));
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
                    'continuous_assessment1' => $grade['continuous_assessment1'] ?? null,
                    'midterm1' => $grade['midterm1'] ?? null,
                    'continuous_assessment2' => $grade['continuous_assessment2'] ?? null,
                    'midterm2' => $grade['midterm2'] ?? null,
                ]
            );
        }

        return redirect()->route('teacher.index', ['class' => $class, 'lesson' => $lesson])
                        ->with('success', 'نمرات با موفقیت ذخیره شدند.');
    }

    public function reportCard(Student $student)
    {
        $firstDigit = substr($student->base, 0, 1);

        switch ($firstDigit) {
            case '1':
                $gradeLevel = 10;
                break;
            case '2':
                $gradeLevel = 11;
                break;
            case '3':
                $gradeLevel = 12;
                break;
            default:
                $gradeLevel = null;
        }

        $lessons = Lesson::where('base', $gradeLevel)->get();

        $grades = \App\Models\Grade::where('student_id', $student->id)->get()->keyBy('lesson_id');

        return view('student.report_card', compact('student', 'lessons', 'grades'));
    }

}