@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Display success or error messages -->
    @if(session('success'))
        <div class="bg-green-500 text-white px-4 py-3 rounded-lg mb-6 flex items-center" role="alert">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white px-4 py-3 rounded-lg mb-6 flex items-center" role="alert">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
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
                }, 5000); // 5 seconds
            </script>
        @endif

    <div class="mb-8 flex justify-between items-center">
        <h1 class="text-3xl font-semibold text-gray-900">All Employees</h1>
        <a href="{{ route('users.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-600 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add New Employee
        </a>
    </div>

    @if($employees->isEmpty())
        <div class="text-center text-gray-600">No employees found.</div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($employees as $employee)
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex justify-center mb-4">
                        <img src="{{ $employee->profile_photo_url ?? 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' }}" alt="{{ $employee->name }}" class="w-24 h-24 rounded-full object-cover">
                    </div>
                    <h2 class="text-xl font-semibold text-center mb-2">{{ $employee->name }}</h2>
                    <p class="text-center text-gray-500 mb-4">{{ $employee->email }}</p>

                    <!-- Role-based display -->
                    <div class="text-center mb-6">
                        <span class="px-2 py-1 text-xs font-medium rounded-full {{ $employee->role == 'admin' ? 'bg-red-500 text-white' : 'bg-green-500 text-white' }}">
                            {{ ucfirst($employee->role) }}
                        </span>
                    </div>

                    <div class="flex justify-center space-x-4">
                        <a href="{{ route('users.show', $employee->id) }}" class="text-blue-600 hover:text-blue-800">View</a>
                    </div>
                </div>
            @endforeach
        </div>
        
    @endif
</div>
@endsection