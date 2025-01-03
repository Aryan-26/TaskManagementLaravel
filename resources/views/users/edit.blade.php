@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-6 shadow-md">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white p-4 rounded-lg mb-6 shadow-md">
            {{ session('error') }}
        </div>
    @endif

  
    <div class="mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Edit User: {{ $user->name }}</h1>
    </div>

  
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" >
                    @error('name')
                        <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

               
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" >
                    @error('email')
                        <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

               
                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role" name="role" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" >
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="employee" {{ $user->role == 'employee' ? 'selected' : '' }}>Employee</option>
                        <option value="client" {{ $user->role == 'client' ? 'selected' : '' }}>Client</option>
                    </select>
                    @error('role')
                        <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

             
                <!-- <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password (Leave empty to keep current password)</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('password')
                        <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>
-->
                <!-- <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div> -->

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                    Update User
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
