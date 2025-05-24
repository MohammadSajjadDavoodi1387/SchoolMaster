<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StudentController;
Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/teachers', [TeacherController::class,'index'])->name('teacher.index');
Route::get('/teachers/create', [TeacherController::class,'create'])->name('teacher.create');
Route::post('/teachers/store', [TeacherController::class,'store'])->name('teacher.store');
Route::get('/teachers/edit/{id}', [TeacherController::class,'edit'])->name('teacher.edit');
Route::post('/teachers/update', [TeacherController::class,'update'])->name('teacher.update');
Route::delete('/teachers/delete/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

Route::resource('lessons', LessonController::class);
Route::get('/lessons/edit/{id}', [LessonController::class, 'edit'])->name('lesson.edit');

Route::resource('students', StudentController::class);
Route::get('/students/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/students/store', [StudentController::class, 'store'])->name('student.store');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/students/{id}', [StudentController::class, 'update'])->name('student.update');
