@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Admin Dashboard</h1>

    
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Projects Card -->
    <div class="bg-blue-50 rounded-lg shadow-lg hover:shadow-xl transition-all transform hover:scale-105 duration-300 w-full p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <!-- Projects Icon (Larger and more prominent) -->
                <svg class="w-12 h-12 text-blue-600 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
                <h2 class="text-2xl font-semibold text-blue-800">Projects</h2>
            </div>
        </div>
        <p class="text-4xl font-bold text-blue-700">{{ $projectCount }}</p>
        <p class="text-sm text-blue-600">Total Projects</p>
    </div>

    <!-- Tasks Card -->
    <div class="bg-green-50 rounded-lg shadow-lg hover:shadow-xl transition-all transform hover:scale-105 duration-300 w-full p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <!-- Tasks Icon (Larger and more prominent) -->
                <svg class="w-12 h-12 text-green-600 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                </svg>
                <h2 class="text-2xl font-semibold text-green-800">Tasks</h2>
            </div>
        </div>
        <p class="text-4xl font-bold text-green-700">{{ $taskCount }}</p>
        <p class="text-sm text-green-600">Total Tasks</p>
    </div>

    <!-- Clients Card -->
    <div class="bg-purple-50 rounded-lg shadow-lg hover:shadow-xl transition-all transform hover:scale-105 duration-300 w-full p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <!-- Clients Icon (Larger and more prominent) -->
                <svg class="w-12 h-12 text-purple-600 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <h2 class="text-2xl font-semibold text-purple-800">Clients</h2>
            </div>
        </div>
        <p class="text-4xl font-bold text-purple-700">{{ $clientCount }}</p>
        <p class="text-sm text-purple-600">Total Clients</p>
    </div>

    <!-- Employees Card -->
    <div class="bg-yellow-50 rounded-lg shadow-lg hover:shadow-xl transition-all transform hover:scale-105 duration-300 w-full p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <!-- Employees Icon (Larger and more prominent) -->
                <svg class="w-12 h-12 text-yellow-600 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <h2 class="text-2xl font-semibold text-yellow-800">Employees</h2>
            </div>
        </div>
        <p class="text-4xl font-bold text-yellow-700">{{ $employeeCount }}</p>
        <p class="text-sm text-yellow-600">Total Employees</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

  <div class="bg-white rounded-lg shadow-md overflow-hidden w-full p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Recent Projects</h2>
    <div class="space-y-4">
      @foreach($recentProjects as $project)
      <div class="bg-gray-50 rounded-lg p-4 shadow-md">
        <h3 class="text-lg font-semibold text-gray-800">{{ $project->name }}</h3>
        <div class="mt-2 flex justify-between text-sm text-gray-600">
          <span>Client: {{ $project->client->name }}</span>
          <span>Tasks: {{ $project->tasks->count() }}</span>
        </div>
        <div class="mt-1 text-sm text-gray-500">
          End Date: {{ $project->end_date->format('M d, Y') }}
        </div>
      </div>
      @endforeach
    </div>
  </div>

  
  <div class="bg-white rounded-lg shadow-md overflow-hidden w-full p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Recent Tasks</h2>
    <div class="space-y-4">
      @foreach($recentTasks as $task)
      <div class="bg-gray-50 rounded-lg p-4 shadow-md">
        <h3 class="text-lg font-semibold text-gray-800">{{ $task->name }}</h3>
        <div class="mt-2 flex justify-between text-sm text-gray-600">
          <span>Project: {{ $task->project->name }}</span>
          <span>Assigned: {{ $task->assignedUser->name }}</span>
        </div>
        <div class="mt-1 flex items-center">
          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $task->status === 'completed'? 'green' : 'yellow' }}-100 text-{{ $task->status === 'completed'? 'green' : 'yellow' }}-800">
            {{ ucfirst($task->status) }}
          </span>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  
  <div class="bg-white rounded-lg shadow-md overflow-hidden w-full p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Recent Clients</h2>
    <div class="space-y-4">
      @foreach($recentClients as $client)
      <div class="bg-gray-50 rounded-lg p-4 shadow-md">
        <h3 class="text-lg font-semibold text-gray-800">{{ $client->name }}</h3>
        <div class="mt-2 text-sm text-gray-600">
          <p>Email: {{ $client->email }}</p>
          <p>Company: {{ $client->clientDetail->company_name?? 'N/A' }}</p>
          <p>Contact: {{ $client->clientDetail->contact_number?? 'N/A' }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>


  <div class="bg-white rounded-lg shadow-md overflow-hidden w-full p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Recent Employees</h2>
    <div class="space-y-4">
      @foreach($recentEmployees as $employee)
      <div class="bg-gray-50 rounded-lg p-4 shadow-md">
        <h3 class="text-lg font-semibold text-gray-800">{{ $employee->name }}</h3>
        <div class="mt-2 text-sm text-gray-600">
          <p>Email: {{ $employee->email }}</p>
          <p>Role: {{ ucfirst($employee->role) }}</p>
          <p>Joined: {{ $employee->created_at->format('M d, Y') }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
    </div>
</div>
@endsection
