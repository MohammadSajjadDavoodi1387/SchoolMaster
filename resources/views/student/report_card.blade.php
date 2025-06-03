@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl rounded-2xl p-6">
            <h2 class="text-3xl font-extrabold text-gray-800 border-b pb-4 mb-6">
                کارنامه {{ $student->name }}
            </h2>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-right text-xs font-bold text-gray-700 uppercase">نام درس</th>
                            <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase">مستمر ۱</th>
                            <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase">پایان‌ترم ۱</th>
                            <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase">مستمر ۲</th>
                            <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase">پایان‌ترم ۲</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-800">
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

                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4 text-right font-medium">{{ $lesson->titleFa }}</td>
                                <td class="px-6 py-4 text-center">{{ $c1 }}</td>
                                <td class="px-6 py-4 text-center">{{ $f1 }}</td>
                                <td class="px-6 py-4 text-center">{{ $c2 }}</td>
                                <td class="px-6 py-4 text-center">{{ $f2 }}</td>
                            </tr>
                        @endforeach

                        @php
                            $averageScore = $totalUnits > 0 ? round($totalScore / $totalUnits, 2) : 0;
                        @endphp

                        {{-- نتایج نهایی پایین جدول --}}
                        <tr class="bg-blue-50 font-bold border-t border-gray-300">
                            <td class="px-6 py-4 text-right">معدل کل</td>
                            <td colspan="4" class="px-6 py-4 text-center text-blue-900">{{ $averageScore }}</td>
                        </tr>
                        <tr class="bg-green-50 font-bold">
                            <td class="px-6 py-4 text-right">مجموع نمرات با ضریب</td>
                            <td colspan="4" class="px-6 py-4 text-center text-green-900">{{ round($totalScore, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
