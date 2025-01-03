@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100">
        
        <!-- Sidebar -->
        <!-- <aside class="fixed top-0 left-0 w-64 bg-blue-700 text-white h-full shadow-lg pt-16">
            <nav class="px-6">
                <a href="{{ route('dashboard') }}"
                    class="block py-3 text-lg font-medium hover:bg-blue-600 transition rounded-lg px-4">
                    Dashboard
                </a>
                <a href="{{ route('projects.index') }}"
                    class="block py-3 text-lg font-medium hover:bg-blue-600 transition rounded-lg px-4">
                    Projects
                </a>
                <a href="{{ route('tasks.index') }}"
                    class="block py-3 text-lg font-medium hover:bg-blue-600 transition rounded-lg px-4">
                    Tasks
                </a>
                
            </nav>
        </aside> -->
    
        <!-- Main Content -->
        <main class="ml-04 pt-20 px-8 bg-gray-100">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-700">Welcome, {{ Auth::user()->name }}</h1>
                <!-- <a href="{{ route('profile.index') }}"
                    class="bg-blue-600 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-700 transition">
                    Edit Profile
                </a> -->
            </div>
    
            <!-- Dashboard Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-gray-600 text-lg font-medium">Active Projects</h2>
                    <p class="text-2xl font-bold text-blue-600 mt-4">8</p>
                </div>
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-gray-600 text-lg font-medium">Completed Tasks</h2>
                    <p class="text-2xl font-bold text-blue-600 mt-4">45</p>
                </div>
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-gray-600 text-lg font-medium">Upcoming Deadlines</h2>
                    <p class="text-2xl font-bold text-blue-600 mt-4">3</p>
                </div>
            </div>
    
            <!-- Recent Activity -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-gray-700 text-lg font-medium mb-4">Recent Activity</h2>
                <ul class="space-y-4">
                    <li class="flex items-center">
                        <div class="bg-blue-500 text-white rounded-full w-10 h-10 flex items-center justify-center">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-700 font-medium">Task #123 completed by John Doe</p>
                            <span class="text-sm text-gray-500">2 hours ago</span>
                        </div>
                    </li>
                    <li class="flex items-center">
                        <div class="bg-blue-500 text-white rounded-full w-10 h-10 flex items-center justify-center">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-700 font-medium">Project "Website Redesign" updated</p>
                            <span class="text-sm text-gray-500">5 hours ago</span>
                        </div>
                    </li>
                </ul>
            </div>
        </main>
    </div>
    
  @endsection