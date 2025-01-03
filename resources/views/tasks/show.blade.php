@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">

   
    <div class="mb-6">
        <h1 class="text-3xl font-extrabold text-gray-900">Task Details</h1>
    </div>

    
    <div class="flex justify-between mb-6 bg-gray-50 p-4 rounded-lg">
        <h2 class="text-2xl font-medium text-gray-900">{{ $task->name }}</h2>
        <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full bg-{{ $task->status }}-100 text-{{ $task->status }}-800">
            {{ ucfirst($task->status) }}
        </span>
    </div>

    
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="divide-y divide-gray-200">
            <div class="px-4 py-5 sm:px-6 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Project</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $task->project->name }}</dd>
            </div>
            <div class="px-4 py-5 sm:px-6 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Assigned To</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $task->assignedUser->name }}</dd>
            </div>
            <div class="px-4 py-5 sm:px-6 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Start Date</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $task->start_date }}</dd>
            </div>
            <div class="px-4 py-5 sm:px-6 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">End Date</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $task->end_date }}</dd>
            </div>
            <div class="px-4 py-5 sm:px-6 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Description</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $task->description }}</dd>
            </div>
            <div class="px-4 py-5 sm:px-6 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Created By</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $task->createdBy->name }}</dd>
            </div>
            <div class="px-4 py-5 sm:px-6 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Updated By</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $task->updatedBy->name }}</dd>
            </div>
        </div>
    </div>

    
    <div class="mt-6 flex justify-end items-center">
        <a href="{{ route('tasks.edit', $task->id) }}" class="px-6 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-300 mr-4">
            Edit Task
        </a>
        <a href="{{ route('tasks.index') }}" class="px-6 py-2 text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition duration-300">
            Back to Task List
        </a>
    </div>
</div>
@endsection