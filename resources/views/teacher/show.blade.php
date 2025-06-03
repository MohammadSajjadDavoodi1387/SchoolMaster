@extends('layouts.app')

@section('content')
<main class="flex-1 p-8 bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <header class="bg-white shadow-lg rounded-xl p-6 mb-8 border border-blue-100">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-blue-800">جزئیات معلم</h1>
                <a href="/teachers" class="text-blue-600 hover:text-blue-800 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
            </div>
        </header>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-blue-100 mb-8">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/3 bg-blue-50 p-6 flex flex-col items-center">
                    <div class="w-32 h-32 mb-4 rounded-full overflow-hidden bg-white border-4 border-blue-200 shadow-md">
                        @if(!empty($teacher->avatar))
                            <img src="{{ asset('storage/teachers/' . $teacher->avatar) }}" 
                                alt="{{ $teacher->name }}" 
                                class="w-full h-full object-cover">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($teacher->name) }}&background=0D8ABC&color=fff&size=128" 
                                alt="{{ $teacher->name }}" 
                                class="w-full h-full object-cover">
                        @endif
                    </div>

                    <h1 class="text-2xl font-bold text-blue-800 mb-2">{{ $teacher->name }}</h1>
                    <div class="mt-6 bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium">
                        کد معلم: {{ $teacher->licence }}
                    </div>
                </div>

                <div class="md:w-2/3 p-6">
                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-blue-800 mb-4 pb-2 border-b border-blue-100">اطلاعات تماس</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-blue-50 rounded-lg p-4 border border-blue-100">
                                <div class="flex items-center">
                                    <div class="bg-blue-100 p-2 rounded-full mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-blue-600 text-xs">شماره تماس</p>
                                        <p class="font-medium text-blue-800">{{ $teacher->phone }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-blue-50 rounded-lg p-4 border border-blue-100">
                                <div class="flex items-center">
                                    <div class="bg-blue-100 p-2 rounded-full mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-blue-600 text-xs">ایمیل</p>
                                        <p class="font-medium text-blue-800">{{ $teacher->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-blue-50 rounded-lg p-4 border border-blue-100 md:col-span-2">
                                <div class="flex items-center">
                                    <div class="bg-blue-100 p-2 rounded-full mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-blue-600 text-xs">آدرس</p>
                                        <p class="font-medium text-blue-800">{{ $teacher->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-blue-800 mb-4 pb-2 border-b border-blue-100">تخصص‌ها</h3>
                        <div class="bg-blue-50 rounded-xl p-5 border border-blue-100 shadow-sm">
                            @forelse($teacher->majors as $major)
                                <p class="text-blue-700 mb-2">
                                    <span class="font-medium text-blue-800">•</span> {{ $major->title }}
                                </p>
                            @empty
                                <p class="text-red-500">تخصصی ثبت نشده است.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 border border-blue-100 mb-8">
            <h3 class="text-xl font-bold text-blue-800 mb-6 pb-2 border-b border-blue-100">برنامه‌های تدریس</h3>
            
            @forelse ($teacher->classTeacherLessons as $program)
                <div class="flex items-center justify-between p-4 mb-4 bg-blue-50 rounded-lg border border-blue-100 hover:bg-blue-100 transition-colors duration-200">
                    <div class="text-blue-800">
                        <span class="font-medium">درس:</span> {{ $program->lesson->titleFa ?? 'نامشخص' }} |
                        <span class="font-medium">کلاس:</span> {{ $program->class_base }}
                    </div>
                    <a href="{{ route('grades.create', ['class' => $program->class_base, 'lesson' => $program->lesson_id]) }}" 
                    class="px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-lg hover:from-blue-700 hover:to-blue-900 transition-all duration-300 shadow-sm text-sm font-medium">
                        ثبت نمرات کلاس
                    </a>
                </div>
            @empty
                <p class="text-red-500 p-3 bg-red-50 rounded-lg border border-red-100">برنامه‌ی درسی‌ای برای این معلم ثبت نشده است.</p>
            @endforelse
        </div>
    </div>
</main>
@endsection