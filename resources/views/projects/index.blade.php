@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">


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
        }, 3000); // 3000ms = 3 seconds
    </script>
    <!-- Heading -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-extrabold text-gray-900">Project List</h1>
        <!-- Create Project Button -->
        <a href="{{ route('projects.create') }}" 
           class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition duration-200">
            Create Project
        </a>
    </div>

   

   
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-sky-100">
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Description</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Status</th>
                    <!-- <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Project ID</th> -->
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Assigned To</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Start Date</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">End Date</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Created By</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Updated By</th>
                    <th class="px-6 py-3 text-center text-sm font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody>
                
                @forelse($projects as $project)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $project->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $project->description }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                        @if($project->tasks->isNotEmpty())
        @foreach($project->tasks as $task)
            <span>{{ $task->status }}</span>
        @endforeach
    @else
        <span>No tasks available</span>
    @endif
                        </td>
                        <!-- <td class="px-6 py-4 text-sm text-gray-700">
                        @if($project->tasks->isNotEmpty())
       
            <span>{{ $task->project_id }}</span>
        
    @endif
                        </td> -->
                        <td class="px-6 py-4 text-sm text-gray-700">

                        @if($project->tasks->isNotEmpty())
       
       <span>{{ $task->assignedUser ? $task->assignedUser->name : 'Unassigned' }}</span>
   
@endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ \Carbon\Carbon::parse($project->start_date)->format('d-m-Y') }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ \Carbon\Carbon::parse($project->end_date)->format('d-m-Y') }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $project->createdBy->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $project->updatedBy->name }}</td>
                        <td class="px-6 py-4 text-center text-sm">
                            <a href="{{ route('projects.show', $project->id) }}" 
                               class="text-blue-600 hover:text-blue-800">View</a> |
                            <a href="{{ route('projects.edit', $project->id) }}" 
                               class="text-yellow-600 hover:text-yellow-800">Edit</a> |
                            <form action="{{ route('projects.destroy', $project->id) }}" 
                                  method="POST" 
                                  class="inline" 
                                  onsubmit="return confirm('Are you sure you want to delete this project?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center text-gray-700 py-4">
                            No projects found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $projects->links() }}
    </div>
</div>
@endsection
