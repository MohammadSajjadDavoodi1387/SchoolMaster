<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'code' => 'required|string|max:15',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:60',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with("success","Student Created Successfully");
    }
    public function destroy($id)
    {
        $students = Student::findOrFail($id);
        $students->delete();

        return redirect()->route('students.index')->with("success","Student delete Successfully");
    }
    public function edit($id)
    {
        $students = Student::findOrFail($id);
        return view('student.edit', compact('students'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10',
            'phone' => 'required|string',
            'address' => 'nullable|string',
        ]);

        $students = Student::findOrFail($id);
        $students->update($request->all());

        return redirect()->route('students.index')->with("success","Student update Successfully");
    }
}
