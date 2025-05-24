<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return view('lesson.index', compact('lessons'));
    }


    public function create()
    {
        return view('lesson.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titleFa' => 'required|string|max:100',
            'titleEn' => 'required|string|max:100',
            'producer' => 'nullable|string|max:10',
            'type' => 'nullable|string|max:40',
            'code' => 'nullable|string|max:40',
            'isActive' => 'required|boolean',
        ]);

        Lesson::create($validated);
        return redirect()->route('lessons.index')->with("success","Lesson Created Successfully");
    }

    public function destroy($id)
    {
        $lessons = Lesson::findOrFail($id);
        $lessons->delete();

        return redirect()->route('lessons.index')->with("success","Lesson delete Successfully");
    }

    public function edit($id)
    {
        $lessons = Lesson::findOrFail($id);
        return view('lesson.edit', compact('lessons'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titleFa' => 'required|string|max:100',
            'titleEn' => 'required|string|max:100',
            'producer' => 'nullable|string|max:100',
            'type' => 'nullable|string|max:40',
            'code' => 'nullable|string|max:40',
            'isActive' => 'required|boolean',
        ]);

        $lessons = Lesson::findOrFail($id);

        $lessons->update($request->only([
            'titleFa', 'titleEn', 'producer', 'type', 'code', 'description', 'isActive'
        ]));

        return redirect()->route('lessons.index')->with("success","Lesson update Successfully");
    }
}