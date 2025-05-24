
@extends('layouts.app')

@section('content')
         <!-- Main Content -->
        <main class="flex-1 p-8">
            <header class="bg-white shadow rounded-lg p-6 mb-8">
                <h1 class="text-2xl font-bold text-gray-800">فرم ویرایش اطلاعات معلم</h1>
            </header>
            <div class="bg-white rounded-lg shadow p-6 max-w-xl mx-auto">
                <form method="POST" action="{{ route('teacher.update') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $teacher->id }}">
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="name">نام پزشک</label>
                        <input id="name" name="name" type="text" value="{{$teacher->name}}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="licence">شماره نظام پزشکی</label>
                        <input id="licence" name="licence" type="text" value="{{$teacher->licence}}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="major">تخصص</label>
                        <input id="major" name="major" type="text" value="{{$teacher->major}}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="phone">شماره تماس</label>
                        <input id="phone" name="phone" type="text" value="{{$teacher->phone}}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="email">ایمیل</label>
                        <input id="email" name="email" type="email" value="{{$teacher->email}}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="address">آدرس</label>
                        <input id="address" name="address" type="text" value="{{$teacher->address}}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 mb-2" for="avatar">آدرس تصویر (اختیاری)</label>
                        <input id="avatar" name="avatar" type="text" value="{{$teacher->avatar}}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 mb-2" for="isActive">وضعیت</label>
                        <input id="isActive" name="isActive" type="text" value="{{$teacher->isActive}}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">ویرایش</button>
                        <a href="{{ route('teacher.index') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400 transition">انصراف</a>
                    </div>
                </form>
            </div>
        </main>
    
@endsection
   