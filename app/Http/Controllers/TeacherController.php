<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
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
        Teacher::create($request->all());
        return redirect()->route('teacher.index')->with("success","Teacher Created Successfully");
    }

    public function edit($id){
        $teacher = Teacher::find($id);
        return view('teacher.edit' , compact('teacher'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'licence' => 'required|string|max:30',
            'major' => 'required|string|max:50',
            'phone' => 'required|string|max:15',
            'email' => 'nullable|email|max:100',
            'address' => 'nullable|string|max:300',
            'avatar' => 'nullable|string|max:300',
            'isActive' => 'required|boolean',
        ]);

        $teacher = Teacher::findOrFail($request->id);

        $teacher->update($request->only([
            'name', 'licence', 'major', 'phone', 'email', 'address', 'avatar', 'isActive'
        ]));

        return redirect()->route('teacher.index')->with('success', 'Teacher updated successfully.');
    }
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teacher.index')->with('success', 'Teacher delete successfully.');
    }
}
