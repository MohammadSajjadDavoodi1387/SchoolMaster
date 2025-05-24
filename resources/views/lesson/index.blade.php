@extends('layouts.app')

@section('content')
     <!-- Main Content -->
     <main class="flex-1 p-8">
        <header class="bg-white shadow rounded-lg p-6 mb-8 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">لیست دروس</h1>
            <a href="{{ route('lessons.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                افزودن درس
            </a>
        </header>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">نام درس</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">نوع درس</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">ضریب درس</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">توضیحات</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($lessons as $lesson)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $lesson->titleFa }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $lesson->type }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $lesson->producer }}</td>
                                <td class="px-6 py-4 whitespace-nowrap flex items-center space-x-2 space-x-reverse">
                                    <a href="{{ url('/lessons/edit/' . $lesson->id) }}" class="text-blue-600 hover:text-blue-800 ml-2" title="جزئیات">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    </a>
                                    <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="inline" onsubmit="return confirm('آیا از حذف مطمئن هستید؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" title="حذف">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

@endsection
