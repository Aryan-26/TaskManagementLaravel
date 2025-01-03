@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <!-- Success and Error Messages -->
        @if (session('success'))
            <div class="mb-8 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg shadow-md">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">
                            <strong>Success!</strong> {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>

            <script>
        setTimeout(() => {
            window.location.href = "{{ route('client.index') }}";
        }, 5000); // 5 seconds
    </script>
        @endif

        @if (session('error'))
            <div class="mb-8 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg shadow-md">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">
                            <strong>Error!</strong> {{ session('error') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Clients Section -->
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-3xl font-semibold text-gray-900">All Clients</h1>
            <div class="flex space-x-4">
                

                <!-- Add Client Details Button -->
                <a href="{{ route('clientDetails.create') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-600 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add New Client
                </a>
            </div>
        </div>

        <!-- Clients Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @if (!empty($clients) && $clients->count())    
        @foreach ($clients as $client)
                <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex justify-center mb-4">
                        <img src="{{ $client->profile_photo_url ?? 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' }}"
                            alt="{{ $client->name }}" class="w-24 h-24 rounded-full object-cover">
                    </div>
                    <h2 class="text-xl font-semibold text-center">{{ $client->name }}</h2>
                    <p class="text-center text-gray-500">{{ $client->email }}</p>
            
                    <!-- Role-based display -->
                    <div class="mt-4 text-center">
                        <span
                            class="px-2 py-1 text-xs font-medium rounded-full {{ $client->role == 'admin' ? 'bg-red-500 text-white' : 'bg-blue-500 text-white' }}">
                            {{ ucfirst($client->role) }}
                        </span>
                    </div>

                    <!-- View Client Link -->
                    <div class="mt-4 flex justify-center space-x-4">
                        <a href="{{ route('users.show', $client->id) }}"
                            class="text-blue-600 hover:text-blue-800">View</a>
                    </div>
                </div>
            @endforeach
        @else
        <p>No clients found.</p>
        @endif
        </div>
    </div>
@endsection
