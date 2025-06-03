@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-blue-50 py-12 px-4 sm:px-6 lg:px-8 flex justify-center mr-auto ml-auto">
    <div class="w-full max-w-5xl transform transition-all duration-300 hover:scale-[1.005]">
        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden border border-blue-200">
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-6 py-5">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-white animate-pulse">
                        کارنامه تحصیلی
                    </h2>
                    <div class="text-blue-100 text-sm">
                        سال تحصیلی ۱۴۰۴-۱۴۰۳
                    </div>
                </div>
                <div class="mt-2">
                    <h3 class="text-xl font-semibold text-blue-200">
                        {{ $student->name }}
                    </h3>
                </div>
            </div>

            <div class="bg-blue-50 px-6 py-3 border-b border-blue-100 flex flex-wrap items-center justify-between">
                <div class="flex items-center space-x-4 space-x-reverse mb-2 sm:mb-0">
                    <div class="flex items-center text-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>کد دانش آموزی: {{ $student->code }}</span>
                    </div>
                </div>
                <div class="text-blue-600 text-sm animate-bounce">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    آخرین بروزرسانی: امروز
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-blue-200">
                    <thead class="bg-blue-100">
                        <tr>
                            <th class="px-6 py-3 text-right text-sm font-bold text-blue-800 uppercase tracking-wider animate-fade-in">نام درس</th>
                            <th class="px-6 py-3 text-center text-sm font-bold text-blue-800 uppercase tracking-wider animate-fade-in delay-100">مستمر ۱</th>
                            <th class="px-6 py-3 text-center text-sm font-bold text-blue-800 uppercase tracking-wider animate-fade-in delay-200">پایان‌ترم ۱</th>
                            <th class="px-6 py-3 text-center text-sm font-bold text-blue-800 uppercase tracking-wider animate-fade-in delay-300">مستمر ۲</th>
                            <th class="px-6 py-3 text-center text-sm font-bold text-blue-800 uppercase tracking-wider animate-fade-in delay-400">پایان‌ترم ۲</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-blue-100">
                        @php
                            $totalScore = 0;
                            $totalUnits = 0;
                            $acceptedUnits = 0;
                        @endphp

                        @foreach ($lessons as $lesson)
                            @php
                                $grade = $grades[$lesson->id] ?? null;

                                $c1 = $grade->continuous_assessment1 ?? 0;
                                $f1 = $grade->midterm1 ?? 0;
                                $c2 = $grade->continuous_assessment2 ?? 0;
                                $f2 = $grade->midterm2 ?? 0;

                                $weightedTotal = $c1 * 1 + $f1 * 2 + $c2 * 1 + $f2 * 4;
                                $average = $weightedTotal / 8;

                                $coefficient = (int) $lesson->producer;
                                $weightedScore = $average * $coefficient;

                                $totalScore += $weightedScore;
                                $totalUnits += $coefficient;

                                if ($average >= 10) {
                                    $acceptedUnits += $coefficient;
                                }
                            @endphp

                            <tr class="transition-all duration-200 hover:bg-blue-50 hover:shadow-inner">
                                <td class="px-6 py-4 text-right font-medium text-blue-900">{{ $lesson->titleFa }}</td>
                                <td class="px-6 py-4 text-center @if($c1 < 10) text-red-600 @else text-green-600 @endif">{{ $c1 }}</td>
                                <td class="px-6 py-4 text-center @if($f1 < 10) text-red-600 @else text-green-600 @endif">{{ $f1 }}</td>
                                <td class="px-6 py-4 text-center @if($c2 < 10) text-red-600 @else text-green-600 @endif">{{ $c2 }}</td>
                                <td class="px-6 py-4 text-center @if($f2 < 10) text-red-600 @else text-green-600 @endif">{{ $f2 }}</td>
                            </tr>
                        @endforeach

                        @php
                            $averageScore = $totalUnits > 0 ? round($totalScore / $totalUnits, 2) : 0;
                        @endphp

                        <tr class="bg-blue-50 font-bold border-t-2 border-blue-200 transform transition hover:scale-[1.01]">
                            <td class="px-6 py-4 text-right text-blue-800">معدل کل</td>
                            <td colspan="4" class="px-6 py-4 text-center text-blue-900 text-xl">{{ $averageScore }}</td>
                        </tr>
                        <tr class="bg-blue-100 font-bold transform transition hover:scale-[1.01]">
                            <td class="px-6 py-4 text-right text-blue-800">مجموع نمرات با ضریب</td>
                            <td colspan="4" class="px-6 py-4 text-center text-blue-900">{{ round($totalScore, 2) }}</td>
                        </tr>
                        <tr class="bg-blue-200 font-bold transform transition hover:scale-[1.01]">
                            <td class="px-6 py-4 text-right text-blue-800">واحدهای گذرانده</td>
                            <td colspan="4" class="px-6 py-4 text-center text-blue-900">{{ $acceptedUnits }} از {{ $totalUnits }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Footer -->
            <div class="bg-blue-50 px-6 py-4 border-t border-blue-200 text-center text-blue-600 text-sm">
                <div class="flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                    برای مشاهده جزئیات بیشتر با مدیر آموزشگاه تماس بگیرید
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
    </style>
</div>
@endsection