@extends('layouts.app')

@section('content')
        <!-- Main Content -->
        <main class="flex-1 p-8">
            <header class="bg-white shadow rounded-lg p-6 mb-8">
                <h1 class="text-2xl font-bold text-gray-800">فرم درس</h1>
            </header>
            <div class="bg-white rounded-lg shadow p-6 max-w-xl mx-auto">
                <form action="{{ route('lessons.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="titleFa">نام درس (فارسی)</label>
                        <input id="titleFa" name="titleFa" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="titleEn">نام درس (انگلیسی)</label>
                        <input id="titleEn" name="titleEn" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="producer">ضریب درس</label>
                        <input id="producer" name="producer" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="type">نوع درس</label>
                        <input id="type" name="type" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="code">کد درس</label>
                        <input id="code" name="code" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="description">توضیحات</label>
                        <textarea id="description" name="description" rows="4" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="isActive">وضعیت</label>
                        <input id="isActive" name="isActive" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">ذخیره</button>
                        <a href="{{ route('lessons.index') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400 transition">انصراف</a>
                    </div>
                </form>
            </div>
        </main>
@endsection
