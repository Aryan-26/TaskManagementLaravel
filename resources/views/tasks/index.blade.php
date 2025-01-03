@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
  
    @if (session('success'))
        <div id='success-message' class="mb-8 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg shadow-md">
            <div class="flex items-center">
                <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <p class="ml-3 text-sm font-medium"><strong>Success!</strong> {{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div id="error-message" class="mb-8 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg shadow-md">
            <div class="flex items-center">
                <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <p class="ml-3 text-sm font-medium"><strong>Error!</strong> {{ session('error') }}</p>
            </div>
        </div>
    @endif

    <script>
        setTimeout(() => {
            const successMessage = document.getElementById('success-message');
            const errorMessage = document.getElementById('error-message');
            
            if (successMessage) successMessage.style.display = 'none';
            if (errorMessage) errorMessage.style.display = 'none';
        }, 3000); 
    </script>

    
  
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-semibold text-gray-900">All Tasks</h1>
            <a href="{{ route('tasks.create') }}"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-600 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add New Task
            </a>
        </div>
        <div class="mt-4 overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-sky-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Project</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Assigned To</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Start Date</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">End Date</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @php
                        $start = ($tasks->currentPage() - 1) * $tasks->perPage() + 1;
                    @endphp

                    @foreach ($tasks as $index => $task)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $start + $index }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $task->name }}</td>
                            <td class="px-6 py-4 whitespace-pre-line text-sm text-gray-500">{{ $task->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ ucfirst($task->status) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $task->project->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $task->assignedUser ? $task->assignedUser->name : 'Unassigned' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $task->start_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $task->end_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex space-x-2">
                                    <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-600 hover:text-blue-800">View</a>
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="text-yellow-600 hover:text-yellow-800">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">{{ $tasks->links('pagination::tailwind') }}</div>
    </div>
</div>
@endsection