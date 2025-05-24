@extends('layouts.app')

@section('content')
<main class="flex-1 p-8">
    <header class="bg-white shadow rounded-lg p-6 mb-8">
        <h1 class="text-2xl font-bold text-gray-800">ویرایش درس</h1>
    </header>
    <div class="bg-white rounded-lg shadow p-6 max-w-xl mx-auto">
        <form action="{{ route('lessons.update', $lessons->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="titleFa">نام درس (فارسی)</label>
                <input id="titleFa" name="titleFa" type="text" value="{{ $lessons->titleFa }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="titleEn">نام درس (انگلیسی)</label>
                <input id="titleEn" name="titleEn" type="text" value="{{ $lessons->titleEn }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="producer">ضریب درس</label>
                <input id="producer" name="producer" type="text" value="{{ $lessons->producer }}" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="type">نوع درس</label>
                <input id="type" name="type" type="text" value="{{ $lessons->type }}" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="code">کد درس</label>
                <input id="code" name="code" type="text" value="{{ $lessons->code }}" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="description">توضیحات</label>
                <textarea id="description" name="description" rows="4" class="w-full border border-gray-300 rounded px-3 py-2">{{ $lessons->description }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="isActive">وضعیت</label>
                <input id="isActive" name="isActive" type="text" value="{{ $lessons->isActive }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">ذخیره تغییرات</button>
                <a href="{{ route('lessons.index') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400 transition">انصراف</a>
            </div>
        </form>
    </div>
</main>
@endsection
