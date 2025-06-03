@extends('layouts.app')

@section('content')

    <main class="flex-1 p-8 bg-gray-900 min-h-screen" style="font-family: 'Vazir', sans-serif;">
        <header class="bg-gray-800 shadow-lg rounded-xl p-6 mb-8 border border-transparent animate-border">
            <h1 class="text-2xl font-bold text-teal-300">خوش آمدید</h1>
            <p class="text-teal-100 mt-2">پنل مدیریت سیستم مدرسه</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-gray-800 rounded-xl shadow-lg p-6 transition-all duration-300 hover:scale-105 hover:shadow-teal-500/10 hover:shadow-xl group">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-teal-900/50 text-teal-400 group-hover:bg-teal-900 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="mr-4">
                        <h3 class="text-teal-200 text-sm">معلمان</h3>
                        <p class="text-2xl font-bold text-teal-100 animate-countup">{{ $teachers->count() }}</p>
                    </div>
                </div>
            </div>

            <!-- Student Card -->
            <div class="bg-gray-800 rounded-xl shadow-lg p-6 transition-all duration-300 hover:scale-105 hover:shadow-teal-500/10 hover:shadow-xl group">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-teal-900/50 text-teal-400 group-hover:bg-teal-900 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="mr-4">
                        <h3 class="text-teal-200 text-sm">دانش آموزان</h3>
                        <p class="text-2xl font-bold text-teal-100 animate-countup">{{ $students->count() }}</p>
                    </div>
                </div>
            </div>

            <!-- Lessons Card -->
            <div class="bg-gray-800 rounded-xl shadow-lg p-6 transition-all duration-300 hover:scale-105 hover:shadow-teal-500/10 hover:shadow-xl group">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-teal-900/50 text-teal-400 group-hover:bg-teal-900 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <div class="mr-4">
                        <h3 class="text-teal-200 text-sm">دروس</h3>
                        <p class="text-2xl font-bold text-teal-100 animate-countup">{{ $lessons->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-10">
            <a href="/program" class="group">
                <button class="w-full bg-gradient-to-r from-teal-600 to-teal-800 hover:from-teal-700 hover:to-teal-900 text-white py-4 rounded-xl shadow-lg transition-all duration-300 hover:shadow-teal-500/30 transform hover:-translate-y-1 font-medium flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span>تنظیم برنامه کلاس‌ها</span>
                </button>
            </a>
        </div>
    </main>

    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />

    <style>
        .animate-border {
            background: linear-gradient(90deg, #0f172a, #134e4a, #0f172a);
            background-size: 200% 200%;
            animation: gradient 3s ease infinite;
            border-image: linear-gradient(90deg, #0f172a, #134e4a, #0f172a) 1;
        }
        
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .animate-countup {
            position: relative;
        }
        
        .animate-countup::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #5eead4, transparent);
            animation: underline 2s ease-in-out infinite;
        }
        
        @keyframes underline {
            0% { transform: scaleX(0); opacity: 0; }
            50% { transform: scaleX(1); opacity: 1; }
            100% { transform: scaleX(0); opacity: 0; }
        }
        
        .group:hover .button-icon {
            transform: translateX(5px);
        }
    </style>
@endsection