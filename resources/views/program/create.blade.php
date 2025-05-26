
@extends('layouts.app')

@section('content')
         <!-- Main Content -->
        <main class="flex-1 p-8">
            <header class="bg-white shadow rounded-lg p-6 mb-8">
                <h1 class="text-2xl font-bold text-gray-800">تنظیم برنامه کلاس ها</h1>
            </header>
            <div class="bg-white rounded-lg shadow p-6 max-w-xl mx-auto">
            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4 text-center shadow">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4 text-center shadow">
                    {{ session('error') }}
                </div>
            @endif

                <form method="POST" action="{{ route('program.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="teacher_id">کد معلم</label>
                        <input id="teacher_id" name="teacher_id" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="lesson_id">کد درس</label>
                        <input id="lesson_id" name="lesson_id" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="class_base">کلاس</label>
                        <input id="class_base" name="class_base" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
 
                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">ذخیره</button>
                        <a href="/" class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400 transition">انصراف</a>
                    </div>
                </form>
            </div>
        </main>
    
@endsection
   