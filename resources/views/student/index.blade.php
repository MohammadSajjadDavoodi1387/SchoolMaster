@extends('layouts.app')

@section('content')
    <main class="flex-1 p-8 bg-gray-50">
        <header class="bg-gradient-to-r from-indigo-800 to-blue-600 shadow-lg rounded-xl p-6 mb-8 flex items-center justify-between animate-gradient">
            <h1 class="text-2xl font-bold text-white">لیست دانش آموزان</h1>
            <a href="{{ route('student.create') }}" class="inline-flex items-center px-4 py-3 bg-white/20 hover:bg-white/30 text-white rounded-lg hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5 border border-white/10 backdrop-blur-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                افزودن دانش آموز جدید
            </a>
        </header>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden animate-fade-in">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200/50">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-right font-semibold text-gray-700 uppercase tracking-wider">عکس</th>
                            <th class="px-6 py-4 text-right font-semibold text-gray-700 uppercase tracking-wider mr-6">نام دانش آموز</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700 uppercase tracking-wider">کد ملی</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700 uppercase tracking-wider">شماره تماس</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700 uppercase tracking-wider">عملیات</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200/30">
                        @foreach($students as $index => $student)
                            <tr class="hover:bg-gray-50/80 transition-colors duration-150 animate-row-in">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex justify-right">
                                        <img class="w-12 h-12 rounded-full object-cover shadow-sm border-2 border-white/30" src="{{ asset('storage/students/'.$student->avatar) }}" alt="{{ $student->name }}" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=random'">
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <div class="flex items-center">
                                        <div class="mr-6">
                                            <a href="{{route('student.show',$student->id)}}" class="font-medium text-blue-600 hover:text-blue-800 transition-colors duration-200">{{ $student->name }}</a>
                                            <div class="text-gray-500 text-xs mt-1">شناسه: {{ $student->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm ml-10 text-gray-700">
                                    {{ $student->code }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    {{ $student->phone }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <a href="{{ url('/students/edit/' . $student->id) }}" class="text-blue-600 hover:text-blue-800 transition-colors duration-200 p-2 rounded-full hover:bg-blue-50" title="ویرایش">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline" onsubmit="return confirm('آیا از حذف این دانش آموز مطمئن هستید؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 transition-colors duration-200 p-2 rounded-full hover:bg-red-50" title="حذف">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <style>
        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 8s ease infinite;
        }
        
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-row-in {
            animation: rowIn 0.3s ease-out forwards;
            opacity: 0;
            transform: translateX(10px);
        }
        
        @keyframes rowIn {
            to { opacity: 1; transform: translateX(0); }
        }
    </style>
@endsection