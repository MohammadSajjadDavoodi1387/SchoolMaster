<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Lesson;

class DashboardController extends Controller
{
    public function index()
    {
        $teachers = Teacher::where('isActive', 1)->get();
        $students = Student::where('isActive', 1)->get();
        $lessons = Lesson::where('isActive', 1)->get();

        return view('index', compact('teachers', 'students', 'lessons'));
    }
}
