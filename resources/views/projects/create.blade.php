@extends('layouts.app')

@section('content')
<div class="container mx-auto mt- px-4">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg">
        <div class="bg-blue-500 text-white px-6 py-4 rounded-t-lg flex items-center space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 5.75L15.25 5.75L15.25 9.25L9.75 9.25L9.75 5.75Z M4 6.5V15.5M19 6.5V15.5M9.75 13.75L15.25 13.75L15.25 17.25L9.75 17.25L9.75 13.75Z" />
            </svg>
            <h2 class="text-xl font-semibold">Create New Project</h2>
        </div>
        <div class="px-6 py-4">
            @if ($errors->any())
                <div class="mb-4 bg-red-100 text-red-700 p-4 rounded-lg">
                    <strong>Errors:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('projects.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Project Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        placeholder="Enter project name" 
                        class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-3"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="3" 
                        placeholder="Brief description of the project"
                        class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-3">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="client_id" class="block text-sm font-medium text-gray-700">Client</label>
                    <select 
                        name="client_id" 
                        id="client_id" 
                        class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-3">
                        <option value="" disabled {{ old('client_id') ? '' : 'selected' }}>Select a client</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                {{ $client->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('client_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Assign Employees</label>
                    <div class="space-y-2">
                        @foreach ($employees as $employee)
                            <div class="flex items-center space-x-3">
                                <input type="checkbox" name="employee_ids[]" value="{{ $employee->id }}"
                                    id="employee_{{ $employee->id }}"
                                    {{ in_array($employee->id, old('employee_ids', [])) ? 'checked' : '' }}
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="employee_{{ $employee->id }}" class="text-sm text-gray-700">
                                    {{ $employee->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('employee_ids')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input 
                            type="date" 
                            name="start_date" 
                            id="start_date" 
                            class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-3"
                            value="{{ old('start_date') }}">
                        @error('start_date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                        <input 
                            type="date" 
                            name="end_date" 
                            id="end_date" 
                            class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-3"
                            value="{{ old('end_date') }}">
                        @error('end_date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <button 
                        type="reset" 
                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Reset
                    </button>
                    <button 
                        type="submit" 
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Create Project
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
