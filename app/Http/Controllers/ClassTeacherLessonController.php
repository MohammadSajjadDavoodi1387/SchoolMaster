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
        try {
            $request->validate([
                'teacher_id' => 'required|exists:teachers,id',
                'lesson_id' => 'required|exists:lessons,id',
                'class_base' => 'required|string|max:50',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('error', 'اطلاعات معلم یا درس اشتباه است.');
        }

        $exists = ClassTeacherLesson::where('teacher_id', $request->teacher_id)
            ->where('lesson_id', $request->lesson_id)
            ->where('class_base', $request->class_base)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'این برنامه قبلاً ثبت شده است.');
        }

        $newEntry = new ClassTeacherLesson();
        $newEntry->teacher_id = $request->teacher_id;
        $newEntry->lesson_id = $request->lesson_id;
        $newEntry->class_base = $request->class_base;
        $newEntry->save();

        return redirect()->back()->with('success', 'برنامه با موفقیت ذخیره شد.');
    }

    public function index()
    {
        $programs = ClassTeacherLesson::with(['teacher', 'lesson'])->get();

        return view('program.index', compact('programs'));
    }
}
