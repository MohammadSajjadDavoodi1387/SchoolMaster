<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Major;
class TeacherController extends Controller
{
    public function index()
    {
        $teacher=Teacher::all();
        return view('teacher.index',compact('teacher'));
    }

    public function create()
    {
        return view('teacher.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'licence' => 'required|string|max:30',
            'phone' => 'required|string|max:15',
            'email' => 'nullable|email|max:100',
            'address' => 'nullable|string|max:300',
            'avatar' => 'nullable|string|max:300',
            'isActive' => 'required|boolean',
            'majors' => 'nullable|array',
            'majors.*' => 'nullable|string|max:100',
        ]);

        $teacher = Teacher::create([
            'name' => $validated['name'],
            'licence' => $validated['licence'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'address' => $validated['address'] ?? null,
            'avatar' => $validated['avatar'] ?? null,
            'isActive' => $validated['isActive'],
        ]);

        if (!empty($validated['majors'])) {
            foreach ($validated['majors'] as $title) {
                if (trim($title)) {
                    $teacher->majors()->create([
                        'title' => trim($title)
                    ]);
                }
            }
        }

        return redirect()->route('teacher.index')->with("success", "معلم با موفقیت ثبت شد");
    }

    public function edit($id){
        $teacher = Teacher::with('majors')->findOrFail($id);
        $teacherMajors = $teacher->majors->pluck('title')->toArray();
        return view('teacher.edit', compact('teacher', 'teacherMajors'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'licence' => 'required|string|max:30',
            'phone' => 'required|string|max:15',
            'email' => 'nullable|email|max:100',
            'address' => 'nullable|string|max:300',
            'avatar' => 'nullable|string|max:300',
            'isActive' => 'required|boolean',
            'majors' => 'nullable|array',
            'majors.*' => 'string|max:255',
        ]);

        $teacher = Teacher::findOrFail($request->id);

        $teacher->update($request->only([
            'name', 'licence', 'phone', 'email', 'address', 'avatar', 'isActive'
        ]));

        $majorsInput = $request->input('majors', []);
        $majorsInput = array_filter(array_map('trim', $majorsInput), fn($m) => $m !== '');
        Major::where('teacher_id', $teacher->id)->delete();
        foreach ($majorsInput as $title) {
            Major::create([
                'title' => $title,
                'teacher_id' => $teacher->id,
            ]);
        }

        return redirect()->route('teacher.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->majors()->delete();
        $teacher->delete();
        return redirect()->route('teacher.index')->with('success', 'Teacher deleted successfully.');
    }
        public function show($id)
    {
        $teacher = Teacher::with('majors')->find($id);
        return view('teacher.show', compact('teacher'));
    }
}
