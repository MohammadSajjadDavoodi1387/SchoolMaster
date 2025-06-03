@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">
        ثبت نمرات درس: {{ $lessonInfo->titleFa ?? 'نامشخص' }} کلاس {{ $class }}
    </h2>

    @if ($students->count() > 0)
        <form action="{{ route('grades.store', ['class' => $class, 'lesson' => $lesson]) }}" method="POST">
            @csrf

            <input type="hidden" name="lesson_id" value="{{ $lesson }}">
            <input type="hidden" name="class_base" value="{{ $class }}">

            <table class="w-full text-sm border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2 border"></th>
                        <th class="p-2 border">نام دانش‌آموز</th>
                        <th class="p-2 border">مستمر اول</th>
                        <th class="p-2 border">نوبت اول</th>
                        <th class="p-2 border">مستمر دوم</th>
                        <th class="p-2 border">نوبت دوم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $key => $student)
                        @php
                            $grade = $existingGrades[$student->id] ?? null;
                        @endphp
                        <tr class="text-center">
                            <td class="p-2 border">{{ $key + 1 }}</td>
                            <td class="p-2 border">{{ $student->name }}</td>
                            <input type="hidden" name="grades[{{ $student->id }}][student_id]" value="{{ $student->id }}">
                            <td class="p-2 border">
                                <input type="number" step="0.01" name="grades[{{ $student->id }}][continuous_assessment1]" class="w-full border p-1"
                                    value="{{ $grade->continuous_assessment1 ?? '' }}">
                            </td>
                            <td class="p-2 border">
                                <input type="number" step="0.01" name="grades[{{ $student->id }}][midterm1]" class="w-full border p-1"
                                    value="{{ $grade->midterm1 ?? '' }}">
                            </td>
                            <td class="p-2 border">
                                <input type="number" step="0.01" name="grades[{{ $student->id }}][continuous_assessment2]" class="w-full border p-1"
                                    value="{{ $grade->continuous_assessment2 ?? '' }}">
                            </td>
                            <td class="p-2 border">
                                <input type="number" step="0.01" name="grades[{{ $student->id }}][midterm2]" class="w-full border p-1"
                                    value="{{ $grade->midterm2 ?? '' }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="mt-4 px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                ثبت نمرات
            </button>
        </form>
    @else
        <div class="text-center text-red-600 font-semibold mt-6">
            هیچ دانش‌آموزی در این کلاس وجود ندارد.
        </div>
    @endif
</div>
@endsection
