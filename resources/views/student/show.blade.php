@extends('layouts.app')

@section('content')
<main class="flex-1 p-8 bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <header class="bg-white shadow-lg rounded-xl p-6 mb-8 border border-blue-100">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-blue-800">جزئیات دانش آموز</h1>
                <a href="/students" class="text-blue-600 hover:text-blue-800 transition-colors duration-200">
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
                        @if(!empty($students->avatar))
                            <img src="{{ asset('storage/students/' . $students->avatar) }}" 
                                alt="{{ $students->name }}" 
                                class="w-full h-full object-cover">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($students->name) }}&background=0D8ABC&color=fff&size=128" 
                                alt="{{ $students->name }}" 
                                class="w-full h-full object-cover">
                        @endif
                    </div>

                    <h1 class="text-2xl font-bold text-blue-800 mb-2">{{ $students->name }}</h1>
                    <div class="mt-6 bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium">
                        کد ملی: {{ $students->code }}
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
                                        <p class="font-medium text-blue-800">{{ $students->phone }}</p>
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
                                        <p class="font-medium text-blue-800">{{ $students->email }}</p>
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
                                        <p class="font-medium text-blue-800">{{ $students->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-blue-50 rounded-xl p-5 border border-blue-100 shadow-sm">
                            <h2 class="text-lg font-bold text-blue-800 mb-3 pb-2 border-b border-blue-200">اطلاعات پدر</h2>
                            <div class="space-y-2">
                                <p class="text-blue-700"><span class="font-medium text-blue-800">نام:</span> {{ $students->nameFather ?? 'NotFound' }}</p>
                                <p class="text-blue-700"><span class="font-medium text-blue-800">تلفن:</span> {{ $students->phoneFather ?? 'NotFound' }}</p>
                                <p class="text-blue-700"><span class="font-medium text-blue-800">کد ملی:</span> {{ $students->codeFather ?? 'NotFound' }}</p>
                            </div>
                        </div>

                        <div class="bg-blue-50 rounded-xl p-5 border border-blue-100 shadow-sm">
                            <h2 class="text-lg font-bold text-blue-800 mb-3 pb-2 border-b border-blue-200">اطلاعات مادر</h2>
                            <div class="space-y-2">
                                <p class="text-blue-700"><span class="font-medium text-blue-800">نام:</span> {{ $students->nameMother ?? 'NotFound' }}</p>
                                <p class="text-blue-700"><span class="font-medium text-blue-800">تلفن:</span> {{ $students->phoneMother ?? 'NotFound' }}</p>
                                <p class="text-blue-700"><span class="font-medium text-blue-800">کد ملی:</span> {{ $students->codeMother ?? 'NotFound' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 border border-blue-100">
            <a href="{{ route('student.report-card', ['student' => $students->id]) }}" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-xl hover:from-blue-700 hover:to-blue-900 transition-all duration-300 shadow-md w-full text-center font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                مشاهده کارنامه
            </a>
        </div>
    </div>
</main>
@endsection