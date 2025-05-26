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
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'code'        => 'required|string|max:15',
            'phone'       => 'required|string|max:15',
            'email'       => 'required|string|email|max:100',
            'nameFather'  => 'required|string|max:60',
            'codeFather'  => 'required|string|max:60',
            'phoneFather' => 'required|string|max:60',
            'nameMother'  => 'required|string|max:60',
            'codeMother'  => 'required|string|max:60',
            'phoneMother' => 'required|string|max:60',
            'avatar'      => 'nullable|string|max:300',
            'address'     => 'required|string|max:60',
            'isActive'    => 'sometimes|boolean',
            'base'        => 'required|string|max:15',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with("success", "Student Created Successfully");
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
            'name'        => 'required|string|max:100',
            'code'        => 'required|string|max:15',
            'phone'       => 'required|string|max:15',
            'email'       => 'required|string|email|max:100',
            'nameFather'  => 'required|string|max:60',
            'codeFather'  => 'required|string|max:60',
            'phoneFather' => 'required|string|max:60',
            'nameMother'  => 'required|string|max:60',
            'codeMother'  => 'required|string|max:60',
            'phoneMother' => 'required|string|max:60',
            'avatar'      => 'nullable|string|max:300',
            'address'     => 'required|string|max:60',
            'isActive'    => 'sometimes|boolean',
            'base'        => 'required|string|max:15',
        ]);

        $students = Student::findOrFail($id);
        $students->update($request->all());

        return redirect()->route('students.index')->with("success","Student update Successfully");
    }

    public function show($id)
    {
        $students=Student::find($id);
        return view('student.show',compact('students'));
    }
}
