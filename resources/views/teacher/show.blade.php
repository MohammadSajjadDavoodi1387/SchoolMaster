
@extends('layouts.app')

@section('content')
<main class="flex-1 p-8">
            <header class="bg-white shadow rounded-lg p-6 mb-8">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-800">جزئیات معلم</h1>
                    <a href="/teachers" class="text-blue-600 hover:text-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>
                </div>
            </header>

            <!-- Student Information -->
            <div class="bg-white rounded-lg shadow p-6 mb-8">
                <div class="flex flex-col md:flex-row">
                    <!-- Student Profile Section -->
                    <div class="md:w-1/3 mb-6 md:mb-0 md:border-l md:pl-6">
                        <div class="flex flex-col items-center mt-15">
                            <div class="w-32 h-32 mb-4 rounded-full overflow-hidden bg-gray-200 border-4 border-blue-100">
                                @if(!empty($teacher->avatar))
                                    <img src="{{ asset('storage/students/' . $teacher->avatar) }}" 
                                        alt="{{ $teacher->name }}" 
                                        class="w-full h-full object-cover rounded-full">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($teacher->name) }}&background=0D8ABC&color=fff&size=128" 
                                        alt="{{ $teacher->name }}" 
                                        class="w-full h-full object-cover rounded-full">
                                @endif
                            </div>

                            <h1 class="text-3xl font-bold text-gray-800 mb-1">{{ $teacher->name }}</h1>
                            <h1 class="text-2xl mt-10 font-bold text-gray-800 mb-1">کد معلم: {{ $teacher->licence }}</h1>                        </div>
                    </div>

                    <!-- Student Details Section -->
                    <div class="md:w-2/3 md:pr-6">
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-3">اطلاعات تماس</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <div>
                                        <p class="text-gray-600 text-sm">شماره تماس</p>
                                        <p class="font-medium">{{ $teacher->phone }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <div>
                                        <p class="text-gray-600 text-sm">ایمیل</p>
                                        <p class="font-medium">{{ $teacher->email }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start md:col-span-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mt-1 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <div>
                                        <p class="text-gray-600 text-sm">آدرس</p>
                                        <p class="font-medium">{{ $teacher->address }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- بخش تخصص -->
                            <div class="w-full mt-6 px-4 py-3 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                                <h2 class="text-xl font-semibold text-gray-700 mb-3 border-b border-gray-300 pb-2">تخصص معلم</h2>
                                <p class="text-gray-600 mb-1"><strong>نام تخصص:</strong> {{ $teacher->major ?? 'NotFound' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prescriptions Section -->
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between h-24">
            <a href="prescription-form.html?doctor_id=1" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition w-full text-center pt-5 pb-5">
                ثبت نمرات
            </a>
            </div>
        </main>
    
@endsection
   