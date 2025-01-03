@extends('layouts.app')

@section('content')
    
    <div class="relative bg-gray-50 mb-6">
        <img src=" https://images.ctfassets.net/rz1oowkt5gyp/1IgVe0tV9yDjWtp68dAZJq/36ca564d33306d407dabe39c33322dd9/TaskManagement-hero.png " alt="{{ $projects->name }}" class="w-full h-64 object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent"></div>
        <div class="absolute inset-0 flex flex-col justify-center items-center text-white text-center px-4">
            <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl">{{ $projects->name }}</h1>
            <p class="mt-3 text-base sm:text-lg lg:text-xl">{{ Str::limit($projects->description, 120) }}</p>
        </div>
    </div>

   
    <div class="bg-white shadow-md rounded-lg p-6 mt-6">
        <h2 class="text-2xl font-extrabold text-gray-900 mb-4">Project Summary</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="flex flex-col">
                <span class="text-gray-600">Start Date:</span>
                <span class="text-lg font-semibold text-gray-900">{{ \Carbon\Carbon::parse($projects->start_date)->format('d ,M, Y') }}</span>
            </div>
            <div class="flex flex-col">
                <span class="text-gray-600">End Date:</span>
                <span class="text-lg font-semibold text-gray-900">{{ \Carbon\Carbon::parse($projects->end_date)->format('d ,M, Y') }}</span>
            </div>
            <div class="flex flex-col">
                <span class="text-gray-600">Status:</span>
                <div class="flex items-center">
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $projects->status }}%"></div>
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-900">{{ $projects->progress }}%</span>
                </div>
            </div>
        </div>
    </div>

   
    <div class="bg-white shadow-md rounded-lg p-6 mt-6">
        <h2 class="text-2xl font-extrabold text-gray-900 mb-4">Project Tasks</h2>
        <div>
            <input type="text" placeholder="Search tasks..." class="border rounded-lg p-2 mb-4 w-full">
        </div>
        <ul class="list-none">
            @foreach ($projects->tasks as $task)
            <li class="flex items-center justify-between py-2 border-b border-gray-200">
                <div class="flex items-center">
                    <input type="checkbox" class="mr-2" {{ $task->status === 'completed' ? 'checked' : '' }}>
                    <span class="text-gray-600">{{ $task->name }}</span>
                </div>
                <span class="text-sm font-semibold text-gray-500">{{ ucfirst($task->status) }}</span>
            </li>
            @endforeach
        </ul>
    </div>
@endsection
