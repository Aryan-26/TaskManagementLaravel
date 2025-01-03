@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">

   
    <div class="mb-6">
        <h1 class="text-3xl font-extrabold text-gray-900">Edit Task</h1>
    </div>

 
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg shadow-md" role="alert">
            <h3 class="font-semibold">Whoops! Something went wrong.</h3>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    

   
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

            
            <div class="sm:col-span-2">
                <label for="name" class="block text-sm font-medium text-gray-700" id="name-label">Task Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $task->name) }}" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('name') border-red-500 @enderror"
                       aria-describedby="name-label">
                @error('name')
                    <p class="text-red-500 text-sm mt-1" id="name-error">{{ $message }}</p>
                @enderror
            </div>

           
            <div class="sm:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" required
                          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('description') border-red-500 @enderror">{{ old('description', $task->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

        
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('status') border-red-500 @enderror">
                    <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

           
            <div>
                <label for="project_id" class="block text-sm font-medium text-gray-700">Project</label>
                <select name="project_id" id="project_id" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('project_id') border-red-500 @enderror">
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id', $task->project_id) == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
                @error('project_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

          
            <div>
                <label for="assigned_to" class="block text-sm font-medium text-gray-700">Assigned To</label>
                <select name="assigned_to" id="assigned_to"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('assigned_to') border-red-500 @enderror" required>
                    <option value="" disabled>Select an employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ old('assigned_to', $task->assigned_to ?? '') == $employee->id ? 'selected' : '' }}>
                            {{ $employee->name }}
                        </option>
                    @endforeach
                </select>
                @error('assigned_to')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

           
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $task->start_date) }}" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('start_date') border-red-500 @enderror">
                @error('start_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $task->end_date) }}" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('end_date') border-red-500 @enderror">
                @error('end_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="mt-6 flex justify-end">
            <button type="submit"
                    class="px-6 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-300"
                    onclick="return confirm('Are you sure you want to update this task?')">
                <svg class="h-4 w-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="https://img.icons8.com/?size=48&id=a04gr8MLo013&format=png"><path d="M4 17l4 4m0-4l4-4m-4 4V7"></path></svg>
                Update Task
            </button>
        </div>
    </form>
</div>


<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        if (!confirm('Are you sure you want to update this task?')) {
            event.preventDefault();
        }
    });
</script>
@endsection