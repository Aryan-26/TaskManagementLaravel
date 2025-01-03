@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
      
        @if(session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded-lg mb-6 shadow-md">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div id="error-message" class="bg-red-500 text-white p-4 rounded-lg mb-6 shadow-md">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success') || session('error'))
            <script>
                setTimeout(() => {
                    // Hide success message
                    const successMessage = document.getElementById('success-message');
                    if (successMessage) {
                        successMessage.style.display = 'none';
                    }

                    // Hide error message
                    const errorMessage = document.getElementById('error-message');
                    if (errorMessage) {
                        errorMessage.style.display = 'none';
                    }
                }, 5000); 
            </script>
        @endif

      
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Create New User</h1>
        </div>

       
        <div class="bg-white p-6 rounded-lg shadow-md">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                 
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" >
                        @error('name')
                            <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" >
                        @error('email')
                            <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    @auth

                    @if (Auth::user()->role === 'admin')
                   
                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                        <select id="role" name="role" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" >
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>Employee</option>
                            <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Client</option>
                        </select>
                        @error('role')
                            <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    @elseif(Auth::user()->role === 'employee')
                    
                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                        <select id="role" name="role" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" >
                  
                            <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>Employee</option>
               
                        </select>
                        @error('role')
                            <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
 @endif
 @endauth
                    

                    
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" >
                        @error('password')
                            <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @error('password')
                            <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
                        @enderror
</div>



               
                <div class="mt-6">
                    <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                        Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
