<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Lesson;
use App\Models\ClassTeacherLesson;

class ClassTeacherLessonController extends Controller
{
    public function program()
    {
        return view('program.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'lesson_id' => 'required|exists:lessons,id',
            'class_base' => 'required|string|max:50',
        ]);

        // بررسی تکراری بودن داده‌ها
        $exists = ClassTeacherLesson::where('teacher_id', $request->teacher_id)
            ->where('lesson_id', $request->lesson_id)
            ->where('class_base', $request->class_base)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'این برنامه قبلاً ثبت شده است.');
        }

        // اگر تکراری نبود، ذخیره شود
        ClassTeacherLesson::create([
            'teacher_id' => $request->teacher_id,
            'lesson_id' => $request->lesson_id,
            'class_base' => $request->class_base,
        ]);

        return redirect()->back()->with('success', 'برنامه کلاس با موفقیت ثبت شد.');
    }



    public function index()
    {
        $programs = ClassTeacherLesson::with(['teacher', 'lesson'])->get();

        return view('program.index', compact('programs'));
    }
}
