@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-8">
  
    @if(session('success'))
        <div class="bg-green-600 text-white p-5 rounded-lg shadow-lg mb-6 transition transform hover:scale-105">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-600 text-white p-5 rounded-lg shadow-lg mb-6 transition transform hover:scale-105">
            {{ session('error') }}
        </div>
    @endif

   
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 tracking-tight">
            User Details: {{ $user->name }}
        </h1>
    </div>

   
    <div class="bg-white p-10 rounded-xl shadow-xl transition duration-500 hover:scale-105">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
           
            <div class="flex justify-center items-center">
                <img src="{{  'https://www.shareicon.net/data/128x128/2016/07/26/802016_man_512x512.png' }}" 
                     alt="{{ $user->name }}" 
                     class="w-44 h-44 rounded-full object-cover shadow-lg transform transition duration-300 hover:scale-105">
            </div>

           
            <div class="space-y-6">
                <div class="space-y-2">
                    <h2 class="text-xl font-semibold text-gray-800">Name</h2>
                    <p class="text-lg text-gray-600">{{ $user->name }}</p>
                </div>

                <div class="space-y-2">
                    <h2 class="text-xl font-semibold text-gray-800">Email</h2>
                    <p class="text-lg text-gray-600">{{ $user->email }}</p>
                </div>

                <div class="space-y-2">
                    <h2 class="text-xl font-semibold text-gray-800">Role</h2>
                    <p class="text-lg">
                        <span class="px-4 py-2 inline-block rounded-full text-xs font-medium 
                            {{ $user->role == 'admin' ? 'bg-red-500 text-white' : 'bg-indigo-600 text-white' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </p>
                </div>

                <div class="space-y-2">
                    <h2 class="text-xl font-semibold text-gray-800">Created At</h2>
                    <p class="text-lg text-gray-600">{{ $user->created_at->format('F j, Y, g:i a') }}</p>
                </div>

                <div class="space-y-2">
                    <h2 class="text-xl font-semibold text-gray-800">Last Updated</h2>
                    <p class="text-lg text-gray-600">{{ $user->updated_at->format('F j, Y, g:i a') }}</p>
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-start">
            <a href="{{ route('users.index') }}" 
               class="inline-flex items-center px-6 py-3 bg-gray-700 text-white rounded-md shadow-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-300 transform hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m6 14l7-7-7-7"></path>
                </svg>
                Back to Users
            </a>
        </div>
    </div>
</div>
@endsection
