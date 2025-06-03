<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد مدیریتی</title>
    <script src="{{asset('assets/js/tail.js')}}"></script>
    <script src="{{asset('assets/js/chart.js')}}"></script>
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <aside class="bg-gradient-to-b from-gray-800 to-gray-900 w-64 min-h-screen p-4 shadow-xl">
            <div class="text-teal-300 text-2xl font-bold mb-8 border-b border-teal-800 pb-4">داشبورد مدیریتی</div>
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="/" class="flex items-center text-teal-100 hover:text-white hover:bg-teal-800/50 block py-2.5 px-4 rounded-lg transition-all duration-200 bg-teal-900/30 border-r-4 border-teal-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            صفحه اصلی
                        </a>
                    </li>
                    <li>
                        <a href="/teachers" class="flex items-center text-teal-100 hover:text-white hover:bg-teal-800/50 block py-2.5 px-4 rounded-lg transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            معلمان
                        </a>
                    </li>
                    <li>
                        <a href="/students" class="flex items-center text-teal-100 hover:text-white hover:bg-teal-800/50 block py-2.5 px-4 rounded-lg transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            دانش آموزان
                        </a>
                    </li>
                    <li>
                        <a href="/lessons" class="flex items-center text-teal-100 hover:text-white hover:bg-teal-800/50 block py-2.5 px-4 rounded-lg transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            دروس
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        @yield('content')
    </div>
</body>
</html>