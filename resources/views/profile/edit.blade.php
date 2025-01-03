@extends('layouts.app')

@section('styles')
    <style>
       
    </style>
@endsection

@section('content')
    <div class="container">
        <h2 class="text-3xl font-semibold">Edit Profile</h2>
        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="input-field mt-1">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="input-field mt-1">
            </div>

            <div class="mb-4">
                <label for="profile_image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                <input type="file" name="profile_image" id="profile_image" class="block w-full mt-1">
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('profile.show', $user->id) }}" class="button-secondary">Cancel</a>
                <button type="submit" class="button-primary">Save Changes</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        
    </script>
@endsection
