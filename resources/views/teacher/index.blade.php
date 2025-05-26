
@extends('layouts.app')

@section('content')
         <!-- Main Content -->
    <main class="flex-1 p-8">
        <header class="bg-white shadow rounded-lg p-6 mb-8 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">لیست معلمان</h1>
            <a href="{{ route('teacher.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                افزودن معلم
            </a>
        </header>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th></th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">نام معلم</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">کد معلم</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">شماره تماس</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">جزئیات</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($teacher as $teachers )
                        <tr>
                            <td><img class="w-12 h-12 rounded-full" src="{{ asset('storage/teachers/'.$teachers->avatar) }}"   /></td>
                            <td class="px-6 py-4 whitespace-nowrap"><a href="{{route('teacher.show',$teachers->id)}}">استاد {{$teachers->name}}</a></td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$teachers->licence}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$teachers->phone}}</td>
                            <td class="px-6 py-4 whitespace-nowrap flex items-center space-x-2 space-x-reverse">
                                <a href="{{route('teacher.edit' , $teachers->id)}}" class="text-blue-600 hover:text-blue-800 ml-2" title="جزئیات">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </a>
                                <form action="{{ route('teacher.destroy', $teachers->id) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این معلم را حذف کنید؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" title="حذف">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
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
   