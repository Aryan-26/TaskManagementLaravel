@extends('layouts.app')

@section('styles')
    <style>
      
    </style>
@endsection

@section('content')
    
    @if (session('success') || session('error'))
        <div class="fixed top-5 right-5 z-50">
            @if (session('success'))
                <div id="successToast" class="toast animate-fade-in bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg p-4 mb-4">
                    <p class="font-bold">Success</p>
                    <p>{{ session('success') }}</p>
                </div>
            @elseif (session('error'))
                <div id="errorToast" class="toast animate-fade-in bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg p-4 mb-4">
                    <p class="font-bold">Error</p>
                    <p>{{ session('error') }}</p>
                </div>
            @endif
        </div>
    @endif

    <div class="bg-white profile-card p-6 sm:p-10 mb-6">
        <div class="flex flex-col sm:flex-row items-center">
            <img class="avatar" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="{{ $user->name }}">
            <div class="text-center sm:text-left mt-4 sm:mt-0 sm:ml-6">
                <h1 class="text-3xl font-semibold text-blue-600">{{ $user->name }}</h1>
                <p class="text-xl text-blue-500">{{ $user->email }}</p>
                <p class="text-xl text-blue-500">{{ $user->number }}</p>
                <a href="{{ route('profile.edit', $user->id) }}" class="button-primary mt-4">Edit Profile</a>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        
    </script>
@endsection
