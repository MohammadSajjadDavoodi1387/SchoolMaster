
# SchoolMaster Project – Code Documentation

This document provides an **English‑language** overview of the key source files in the SchoolMaster Laravel project.  
It is intended for developers who want a quick understanding of what each class does and where to look for specific functionality.

---

## 1. Controllers (`app/Http/Controllers`)

| Controller | Purpose | Key Public Methods |
|------------|---------|--------------------|
| **DashboardController.php** | Loads the landing dashboard that aggregates high‑level statistics and shortcuts. | `index()` |
| **TeacherController.php** | Full CRUD for teachers. | `index()`, `create()`, `store()`, `edit($id)`, `update()`, `destroy($id)`, `show($id)` |
| **StudentController.php** | Full CRUD for students plus report‑card generation. | same CRUD set, `reportCard($student)` |
| **LessonController.php** | Full CRUD for lessons, implemented as a Laravel *resource* controller. | auto‑generated resource actions |
| **GradeController.php** | Handles grade entry, update, and retrieval. | `index($class, $lesson)`, `store($class, $lesson)`, `reportCard($student)` |
| **ClassTeacherLessonController.php** | Manages the timetable – connects a teacher to a specific class and lesson slot. | `program()`, `store()` |
| **Controller.php** | Base controller that other controllers extend; holds common middleware and helpers. | – |

---

## 2. Models (`app/Models`)

| Model | Table | Brief Description |
|-------|-------|-------------------|
| **Teacher.php** | `teachers` | Represents a teacher record. Contains relationships to `lessons` and `class_teacher_lessons`. |
| **Student.php** | `students` | Represents a student. Holds relationships to `grades` and can compute GPA‑like aggregates. |
| **Lesson.php** | `lessons` | Represents a lesson/course offered by the school. |
| **Grade.php** | `grades` | Stores four assessment fields (`continuous_assessment1`, `midterm1`, `continuous_assessment2`, `midterm2`). Belongs to `student` and `lesson`. |
| **ClassTeacherLesson.php** | `class_teacher_lessons` | Pivot‑style model that links a `class` (grade level), a `teacher`, and a `lesson`. |
| **Major.php** | `majors` | Optional categorisation of students/lessons into majors or tracks. |
| **User.php** | `users` | Standard Laravel auth model. Only used when authentication is enabled. |

> **Relationships** are defined using Eloquent (`hasMany`, `belongsTo`, `belongsToMany`) to enable expressive querying.

---

## 3. Routes (`routes/web.php`)

* **Teachers** – CRUD routes, e.g. `/teachers`, `/teachers/create`, `/teachers/{id}`.  
* **Students** – CRUD routes **plus** `/students/report-card/{student}` for printable report cards.  
* **Lessons** – `Route::resource('lessons', LessonController::class)` covers all lesson actions.  
* **Programme (Timetable)** – `/program` (GET) renders the timetable builder; `/program/store` (POST) saves it.  
* **Grades** – `/grades/create/{class}/{lesson}` for grade entry, and `/grades/store/{class}/{lesson}` to persist.  
* The root path `/` maps to `DashboardController@index`.

Route names (`->name('…')`) are used in Blade templates for safe, maintainable URL generation.

---

## 4. Database Layer

* **Migrations** in `database/migrations/` create tables for users, teachers, students, lessons, grades, and timetables.  
* **Factories** in `database/factories/` make seed data for quick local testing.  
* **Seeders** populate essential lookup tables via `php artisan db:seed`.

---

## 5. Views

Blade templates live under `resources/views/`. Each domain (teacher, student, lesson, …) has its own sub‑folder.  
Common layout markup resides in `views/layouts/app.blade.php` for consistent styling.

---

## 6. Assets

Compiled CSS (`public/css/app.css`) and JavaScript (`public/js/app.js`) are generated through Laravel Mix / Vite.  
Run `npm run dev` (or `npm run build` for production) to rebuild assets.

---

## Contact

Questions or issues? Please reach out via **sajjaddavoodi1387@gmail.com**.

---
