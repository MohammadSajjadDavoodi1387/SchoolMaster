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
        <!-- Sidebar -->
        <aside class="bg-gray-800 w-64 min-h-screen p-4">
            <div class="text-white text-2xl font-bold mb-8">داشبورد</div>
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="/" class="text-white block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 bg-gray-700">
                            صفحه اصلی
                        </a>
                    </li>
                    <li>
                        <a href="/teachers" class="text-white block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                            معلمان
                        </a>
                    </li>
                    <li>
                        <a href="/students" class="text-white block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                            دانش آموزان
                        </a>
                    </li>
                    <li>
                        <a href="/lessons" class="text-white block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                            دروس
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        @yield('content')
    </div>
</body>
</html> 