@extends('layouts.app')

@section('content')
    <main class="flex-1 p-8 bg-gray-50 min-h-screen">
        <header class="bg-gradient-to-r from-indigo-800 to-blue-600 shadow-lg rounded-xl p-6 mb-8 flex items-center justify-between animate-gradient">
            <h1 class="text-2xl font-bold text-white">فرم ویرایش اطلاعات معلم</h1>
            <a href="{{ route('teacher.index') }}" class="inline-flex items-center px-4 py-3 bg-white/20 hover:bg-white/30 text-white rounded-lg hover:shadow-md transition-all duration-300 transform hover:-translate-y-0.5 border border-white/10 backdrop-blur-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                بازگشت به لیست
            </a>
        </header>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden animate-fade-in max-w-4xl mx-auto">
            <form method="POST" action="{{ route('teacher.update') }}" class="p-6">
                @csrf
                <input type="hidden" name="id" value="{{ $teacher->id }}">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">نام معلم</label>
                        <div class="relative">
                            <input id="name" name="name" type="text" value="{{ $teacher->name }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 placeholder-gray-400"
                                placeholder="نام کامل معلم">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="licence" class="block text-sm font-medium text-gray-700 mb-2">کد معلم</label>
                        <div class="relative">
                            <input id="licence" name="licence" type="text" value="{{ $teacher->licence }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 placeholder-gray-400"
                                placeholder="کد معلم">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6 md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">تخصص‌ها</label>
                        <div id="majors-container" class="space-y-3">
                            @if(count($teacherMajors) > 0)
                                @foreach($teacherMajors as $major)
                                    <div class="flex items-center gap-2">
                                        <div class="relative flex-1">
                                            <input name="majors[]" type="text" value="{{ $major }}" 
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 placeholder-gray-400" />
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <button type="button" onclick="this.parentElement.remove()" 
                                            class="text-white bg-red-500 hover:bg-red-600 px-4 py-3 rounded-lg shadow hover:shadow-md transition-all duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                            </svg>
                                        </button>
                                    </div>
                                @endforeach
                            @else
                                <div class="flex items-center gap-2">
                                    <div class="relative flex-1">
                                        <input name="majors[]" type="text" placeholder="مثلاً ریاضی" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 placeholder-gray-400" />
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <button type="button" onclick="this.parentElement.remove()" 
                                        class="text-white bg-red-500 hover:bg-red-600 px-4 py-3 rounded-lg shadow hover:shadow-md transition-all duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                        </svg>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <button type="button" onclick="addMajorInput()" 
                            class="mt-2 text-white bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg shadow hover:shadow-md transition-all duration-300 inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            افزودن تخصص
                        </button>
                    </div>

                    <div class="mb-6">
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">شماره تماس</label>
                        <div class="relative">
                            <input id="phone" name="phone" type="text" value="{{ $teacher->phone }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 placeholder-gray-400"
                                placeholder="شماره تماس معلم">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">ایمیل</label>
                        <div class="relative">
                            <input id="email" name="email" type="email" value="{{ $teacher->email }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 placeholder-gray-400"
                                placeholder="آدرس ایمیل">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="avatar" class="block text-sm font-medium text-gray-700 mb-2">عکس معلم</label>
                        <div class="relative">
                            <input id="avatar" name="avatar" type="text" value="{{ $teacher->avatar }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 placeholder-gray-400"
                                placeholder="آدرس تصویر">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="isActive" class="block text-sm font-medium text-gray-700 mb-2">وضعیت</label>
                        <div class="relative">
                            <select id="isActive" name="isActive" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 appearance-none bg-white">
                                <option value="1" {{ $teacher->isActive == 1 ? 'selected' : '' }}>فعال</option>
                                <option value="0" {{ $teacher->isActive == 0 ? 'selected' : '' }}>غیرفعال</option>
                            </select>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6 md:col-span-2">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">آدرس</label>
                        <textarea id="address" name="address" rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 placeholder-gray-400"
                            placeholder="آدرس کامل">{{ $teacher->address }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end space-x-4 space-x-reverse mt-8">
                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        ذخیره تغییرات
                    </button>
                    <a href="{{ route('teacher.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-lg transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        انصراف
                    </a>
                </div>
            </form>
        </div>

        <script>
            function addMajorInput() {
                const container = document.getElementById('majors-container');
                
                const wrapper = document.createElement('div');
                wrapper.className = 'flex items-center gap-2';
                
                const inputWrapper = document.createElement('div');
                inputWrapper.className = 'relative flex-1';
                
                const input = document.createElement('input');
                input.name = 'majors[]';
                input.type = 'text';
                input.placeholder = 'تخصص دیگر...';
                input.className = 'w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 placeholder-gray-400';
                
                const icon = document.createElement('div');
                icon.className = 'absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400';
                icon.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                `;
                
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'text-white bg-red-500 hover:bg-red-600 px-4 py-3 rounded-lg shadow hover:shadow-md transition-all duration-300';
                removeBtn.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                `;
                removeBtn.onclick = () => wrapper.remove();
                
                inputWrapper.appendChild(input);
                inputWrapper.appendChild(icon);
                wrapper.appendChild(inputWrapper);
                wrapper.appendChild(removeBtn);
                
                container.appendChild(wrapper);
            }
        </script>
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
        
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 1em;
        }
    </style>
@endsection