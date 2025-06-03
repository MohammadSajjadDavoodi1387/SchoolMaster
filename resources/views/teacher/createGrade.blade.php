@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg shadow-xl transform transition-all duration-300 hover:shadow-2xl">
    <h2 class="text-2xl font-bold mb-6 text-blue-800 border-b-2 border-blue-200 pb-2 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        ثبت نمرات درس: {{ $lessonInfo->titleFa ?? 'نامشخص' }} کلاس {{ $class }}
    </h2>

    @if ($students->count() > 0)
        <form action="{{ route('grades.store', ['class' => $class, 'lesson' => $lesson]) }}" method="POST" class="animate-fade-in-up">
            @csrf

            <input type="hidden" name="lesson_id" value="{{ $lesson }}">
            <input type="hidden" name="class_base" value="{{ $class }}">

            <div class="overflow-x-auto rounded-lg border border-blue-200 shadow-sm">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gradient-to-r from-blue-600 to-blue-800 text-white">
                            <th class="p-3 border-r border-blue-500 text-center w-12">#</th>
                            <th class="p-3 border-r border-blue-500 text-right">نام دانش‌آموز</th>
                            <th class="p-3 border-r border-blue-500">مستمر اول</th>
                            <th class="p-3 border-r border-blue-500">نوبت اول</th>
                            <th class="p-3 border-r border-blue-500">مستمر دوم</th>
                            <th class="p-3">نوبت دوم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $key => $student)
                            @php
                                $grade = $existingGrades[$student->id] ?? null;
                            @endphp
                            <tr class="text-center transition-colors duration-200 hover:bg-blue-50 even:bg-blue-50/50">
                                <td class="p-3 border border-blue-100">{{ $key + 1 }}</td>
                                <td class="p-3 border border-blue-100 text-right font-medium text-blue-900">{{ $student->name }}</td>
                                <input type="hidden" name="grades[{{ $student->id }}][student_id]" value="{{ $student->id }}">
                                <td class="p-3 border border-blue-100">
                                    <input type="number" step="0.01" name="grades[{{ $student->id }}][continuous_assessment1]" 
                                        class="w-20 p-2 border border-blue-200 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-center"
                                        value="{{ $grade->continuous_assessment1 ?? '' }}"
                                        min="0" max="20">
                                </td>
                                <td class="p-3 border border-blue-100">
                                    <input type="number" step="0.01" name="grades[{{ $student->id }}][midterm1]" 
                                        class="w-20 p-2 border border-blue-200 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-center"
                                        value="{{ $grade->midterm1 ?? '' }}"
                                        min="0" max="20">
                                </td>
                                <td class="p-3 border border-blue-100">
                                    <input type="number" step="0.01" name="grades[{{ $student->id }}][continuous_assessment2]" 
                                        class="w-20 p-2 border border-blue-200 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-center"
                                        value="{{ $grade->continuous_assessment2 ?? '' }}"
                                        min="0" max="20">
                                </td>
                                <td class="p-3 border border-blue-100">
                                    <input type="number" step="0.01" name="grades[{{ $student->id }}][midterm2]" 
                                        class="w-20 p-2 border border-blue-200 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-center"
                                        value="{{ $grade->midterm2 ?? '' }}"
                                        min="0" max="20">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-lg shadow-md hover:from-blue-700 hover:to-blue-900 transition-all duration-300 transform hover:scale-105 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    ثبت نمرات
                </button>
            </div>
        </form>
    @else
        <div class="text-center p-8 bg-white rounded-lg border border-blue-200 shadow-sm animate-pulse">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-blue-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <h3 class="text-xl font-semibold text-blue-800 mb-2">هیچ دانش‌آموزی در این کلاس وجود ندارد</h3>
            <p class="text-blue-600">لطفاً بعداً مجدداً بررسی نمایید</p>
        </div>
    @endif
</div>

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.5s ease-out forwards;
    }
    
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type="number"] {
        -moz-appearance: textfield;
    }
</style>
@endsection