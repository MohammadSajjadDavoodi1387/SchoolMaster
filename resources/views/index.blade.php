
@extends('layouts.app')

@section('content')
         <!-- Main Content -->
         <main class="flex-1 p-8">
            <header class="bg-white shadow rounded-lg p-6 mb-8">
                <h1 class="text-2xl font-bold text-gray-800">خوش آمدید</h1>
                <p class="text-gray-600">پنل مدیریت سیستم مدرسه</p>
            </header>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="mr-4">
                            <h3 class="text-gray-500 text-sm">معلمان</h3>
                            <p class="text-2xl font-bold text-gray-800">{{ $teachers->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="mr-4">
                            <h3 class="text-gray-500 text-sm">دانش آموزان</h3>
                            <p class="text-2xl font-bold text-gray-800">{{ $students->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <div class="mr-4">
                            <h3 class="text-gray-500 text-sm">دروس</h3>
                            <p class="text-2xl font-bold text-gray-800">{{ $lessons->count() }}</p>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Charts and Tables Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Prescription Trends Chart -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">روند نسخه‌ها</h2>
                    <div class="h-80">
                        <canvas id="prescriptionTrendsChart"></canvas>
                    </div>
                </div>

                <!-- Most Active Doctors -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">پزشکان فعال</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">نام پزشک</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">تخصص</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">تعداد نسخه</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">دکتر علی رضایی</td>
                                    <td class="px-6 py-4 whitespace-nowrap">داخلی</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            ۳۵۶
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">دکتر مریم احمدی</td>
                                    <td class="px-6 py-4 whitespace-nowrap">اطفال</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            ۲۸۹
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">دکتر رضا حسینی</td>
                                    <td class="px-6 py-4 whitespace-nowrap">ارتوپدی</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            ۲۴۵
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">دکتر سارا محمدی</td>
                                    <td class="px-6 py-4 whitespace-nowrap">چشم</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            ۱۹۸
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Drugs Prescribed by Doctors Chart -->
            <div class="bg-white rounded-lg shadow p-6 mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4">روند کلی داروها و بیماران</h2>
                <div class="h-80">
                    <canvas id="drugsByDoctorsChart"></canvas>
                </div>
            </div>

            <!-- Latest Prescriptions -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">آخرین نسخه‌ها</h2>
                    <a href="prescriptions.html" class="text-blue-600 hover:text-blue-800 text-sm">مشاهده همه</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">شماره نسخه</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">پزشک</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">بیمار</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">تاریخ</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">وضعیت</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">عملیات</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">RX-2023-045</td>
                                <td class="px-6 py-4 whitespace-nowrap">دکتر علی رضایی</td>
                                <td class="px-6 py-4 whitespace-nowrap">سارا محمدی</td>
                                <td class="px-6 py-4 whitespace-nowrap">۱۴۰۲/۰۸/۲۰</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        تکمیل شده
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap flex items-center space-x-2 space-x-reverse">
                                    <a href="prescription-details.html?id=45" class="text-blue-600 hover:text-blue-800 ml-2" title="جزئیات">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">RX-2023-044</td>
                                <td class="px-6 py-4 whitespace-nowrap">دکتر مریم احمدی</td>
                                <td class="px-6 py-4 whitespace-nowrap">رضا حسینی</td>
                                <td class="px-6 py-4 whitespace-nowrap">۱۴۰۲/۰۸/۱۹</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        در انتظار
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap flex items-center space-x-2 space-x-reverse">
                                    <a href="prescription-details.html?id=44" class="text-blue-600 hover:text-blue-800 ml-2" title="جزئیات">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">RX-2023-043</td>
                                <td class="px-6 py-4 whitespace-nowrap">دکتر رضا حسینی</td>
                                <td class="px-6 py-4 whitespace-nowrap">مریم احمدی</td>
                                <td class="px-6 py-4 whitespace-nowrap">۱۴۰۲/۰۸/۱۸</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        تکمیل شده
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap flex items-center space-x-2 space-x-reverse">
                                    <a href="prescription-details.html?id=43" class="text-blue-600 hover:text-blue-800 ml-2" title="جزئیات">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <script>
            // Prescription Trends Chart
            const ctx = document.getElementById('prescriptionTrendsChart').getContext('2d');
            const prescriptionTrendsChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
                    datasets: [{
                        label: 'تعداد نسخه',
                        data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
    
            // Drugs Prescribed by Doctors Chart
            const drugsCtx = document.getElementById('drugsByDoctorsChart').getContext('2d');
            const drugsByDoctorsChart = new Chart(drugsCtx, {
                type: 'line',
                data: {
                    labels: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
                    datasets: [
                        {
                            label: 'تعداد کل داروهای تجویز شده',
                            data: [1245, 1050, 1480, 1620, 1350, 1190, 2010, 2150, 1880, 2220, 2550, 2680],
                            borderColor: 'rgb(54, 162, 235)',
                            backgroundColor: 'rgba(54, 162, 235, 0.06)',
                            tension: 0.3,
                            fill: true
                        },
                        {
                            label: 'تعداد کل بیماران',
                            data: [356, 381, 485, 580, 410, 685, 510, 820, 890, 960, 1330, 1100],
                            borderColor: 'rgb(255, 99, 132)',
                            backgroundColor: 'rgba(255, 99, 132, 0.06)',
                            tension: 0.3,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'تعداد'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'ماه'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                            align: 'end'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.y !== null) {
                                        label += context.parsed.y.toLocaleString('fa-IR');
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        </script>
@endsection
   