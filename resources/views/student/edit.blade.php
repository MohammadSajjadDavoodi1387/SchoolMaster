@extends('layouts.app')

@section('content')
<main class="flex-1 p-8">
    <header class="bg-white shadow rounded-lg p-6 mb-8">
        <h1 class="text-2xl font-bold text-gray-800">ویرایش اطلاعات دانش آموزان</h1>
    </header>

    <div class="bg-white rounded-lg shadow p-6">
        <form class="space-y-6" action="{{ route('student.update', $students->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">نام دانش آموز</label>
                <input type="text" id="name" name="name" value="{{ $students->name }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-5">
            </div>

            <div>
                <label for="code" class="block text-sm font-medium text-gray-700">کد ملی</label>
                <input type="text" id="code" name="code" value="{{ $students->code }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-5">
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">شماره تماس فرزند</label>
                <input type="text" id="phone" name="phone" value="{{ $students->phone }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-5">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">ایمیل</label>
                <input type="text" id="email" name="email" value="{{ $students->email }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-5">
            </div>

            <div>
                <label for="nameFather" class="block text-sm font-medium text-gray-700">نام پدر</label>
                <input type="text" id="nameFather" name="nameFather" value="{{ $students->nameFather }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-5">
            </div>

            <div>
                <label for="codeFather" class="block text-sm font-medium text-gray-700">کد ملی پدر</label>
                <input type="text" id="codeFather" name="codeFather" value="{{ $students->codeFather }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-5">
            </div>

            <div>
                <label for="phoneFather" class="block text-sm font-medium text-gray-700">شماره تلفن پدر</label>
                <input type="text" id="phoneFather" name="phoneFather" value="{{ $students->phoneFather }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-5">
            </div>

            <div>
                <label for="nameMother" class="block text-sm font-medium text-gray-700">نام مادر</label>
                <input type="text" id="nameMother" name="nameMother" value="{{ $students->nameMother }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-5">
            </div>

            <div>
                <label for="codeMother" class="block text-sm font-medium text-gray-700">کد ملی مادر</label>
                <input type="text" id="codeMother" name="codeMother" value="{{ $students->codeMother }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-5">
            </div>

            <div>
                <label for="phoneMother" class="block text-sm font-medium text-gray-700">شماره تلفن مادر</label>
                <input type="text" id="phoneMother" name="phoneMother" value="{{ $students->phoneMother }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-5">
            </div>

            <div>
                <label for="avatar" class="block text-sm font-medium text-gray-700">عکس دانش آموز (اختیاری)</label>
                <input type="text" id="avatar" name="avatar" value="{{ $students->avatar }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-5">
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">آدرس</label>
                <textarea id="address" name="address" rows="3"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-5">{{ $students->address }}</textarea>
            </div>

            <div>
                <label for="isActive" class="block text-sm font-medium text-gray-700">فعال بودن یا حذف شدن</label>
                <input type="text" id="isActive" name="isActive" value="{{ $students->isActive }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-5">
            </div>

            <div>
                <label for="base" class="block text-sm font-medium text-gray-700">کلاس</label>
                <input type="text" id="base" name="base" value="{{ $students->base }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-5">
            </div>

            <div class="flex justify-end space-x-4 space-x-reverse">
                <a href="{{ route('students.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    انصراف
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    ذخیره تغییرات
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
