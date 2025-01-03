@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 px-4">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg">
        <div class="bg-blue-500 text-white px-6 py-4 rounded-t-lg flex items-center space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 5.75L15.25 5.75L15.25 9.25L9.75 9.25L9.75 5.75Z M4 6.5V15.5M19 6.5V15.5M9.75 13.75L15.25 13.75L15.25 17.25L9.75 17.25L9.75 13.75Z" />
            </svg>
            <h2 class="text-xl font-semibold">Edit Project</h2>
        </div>
        <div class="px-6 py-6">
            <form action="{{ route('projects.update', $project->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        Project Name
                    </label>
                    <div class="relative mt-1">
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            placeholder="Enter project name" 
                            class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-3"
                            value="{{ old('name', $project->name) }}" 
                            required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">
                        Description
                    </label>
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="4" 
                        placeholder="Provide a brief description of the project"
                        class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-3"
                        required>{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="client_id" class="block text-sm font-medium text-gray-700">
                        Client
                    </label>
                    <!-- <select 
                        name="client_id" 
                        id="client_id" 
                        class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-3"
                        required>
                        <option value="" disabled>Select Client</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ old('client_id', $project->client_id) == $client->id ? 'selected' : '' }}>
                                {{ $client->name }}
                            </option>
                        @endforeach
                    </select> -->
                      <select 
                        name="client_id" 
                        id="client_id" 
                        class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-3">
                        <option value="" disabled {{ old('client_id') ? '' : 'selected' }}>Select a client</option>
                        @if (!empty($clients))
                            @foreach ($clients as $client)
                            <option value="{{$client->id}}" 
                      @if($client->id == old('client_id', $client->id)) selected @endif>
                      {{$client->name}}
                    </option>
                            @endforeach
                        @else
                            <option value="" disabled>No clients available</option>
                        @endif
                    </select>
                    @error('client_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-4">
  <label class="block text-sm font-medium text-gray-700" for="employee-search">Assign Employees<span class="text-red-500">*</span></label>


  <!-- <div class="relative">
    <input type="text" id="employee-search" class="w-full px-3 py-2 border rounded-md border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Search employees">
    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
      <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
      </svg>
    </div>
  </div> -->

  
  <div class="max-h-64 overflow-y-auto p-1">
  @foreach ($employees as $employee)
    <label class="flex items-center space-x-3 p-2 rounded cursor-pointer hover:bg-gray-100">
        <input type="checkbox" name="employee_ids[]" value="{{ $employee->id }}"
            id="employee_{{ $employee->id }}"
            {{ in_array($employee->id, old('employee_ids', $project->users ? $project->users->pluck('id')->toArray() : [])) ? 'checked' : '' }}
            class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
        <span class="text-sm text-gray-700">{{ $employee->name }}</span>
    </label>
@endforeach

  </div> 


  @error('employee_ids')
    <p class="mt-2 text-sm text-red-600" id="employee-error">{{ $message }}</p>
  @enderror 
</div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">
                            Start Date
                        </label>
                        <input 
                            type="date" 
                            name="start_date" 
                            id="start_date" 
                            class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-3"
                            value="{{ old('start_date', $project->start_date->toDateString()) }}" 
                            required>
                        @error('start_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700">
                            End Date
                        </label>
                        <input 
                            type="date" 
                            name="end_date" 
                            id="end_date" 
                            class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-3"
                            value="{{ old('end_date', $project->end_date->toDateString()) }}" 
                            required>
                        @error('end_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end items-center">
                    <button 
                        type="submit" 
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update Project
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
