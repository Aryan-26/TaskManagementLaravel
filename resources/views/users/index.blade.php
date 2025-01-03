@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 space-y-8">
    <!-- Flash Messages -->
    @if(session('success'))
        <div id="success-message" class="bg-green-500 text-white p-4 rounded-lg shadow-md flex items-center justify-between transform transition duration-500 hover:scale-105">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.style.display='none'" class="ml-4 text-white text-lg font-semibold">×</button>
        </div>
    @endif

    @if(session('error'))
        <div id="error-message" class="bg-red-500 text-white p-4 rounded-lg shadow-md flex items-center justify-between transform transition duration-500 hover:scale-105">
            <span>{{ session('error') }}</span>
            <button onclick="this.parentElement.style.display='none'" class="ml-4 text-white text-lg font-semibold">×</button>
        </div>
    @endif

    @if ($errors->any())
        <div id="validation-errors" class="bg-red-500 text-white p-4 rounded-lg shadow-md">
            <ul class="list-disc pl-5 space-y-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
        setTimeout(() => {
            ['success-message', 'error-message', 'validation-errors'].forEach(id => {
                const element = document.getElementById(id);
                if (element) element.style.display = 'none';
            });
        }, 5000);
    </script>

    <!-- Page Header -->
    <div class="flex justify-between items-center">
        <h1 class="text-4xl font-extrabold text-gray-900">User Management</h1>
        <a href="{{ route('users.create') }}" class="flex items-center px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-lg hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform hover:scale-105 transition duration-300">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add New User
        </a>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
    <div class="overflow-auto" style="max-height: 500px;">
        <table class="w-full table-auto border-collapse">
            <thead class="sticky top-0 bg-gradient-to-r from-indigo-500 to-blue-500 text-white z-10">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-bold">ID</th>
                    <th class="px-6 py-4 text-left text-sm font-bold">Profile</th>
                    <th class="px-6 py-4 text-left text-sm font-bold">Name</th>
                    <th class="px-6 py-4 text-left text-sm font-bold">Email</th>
                    <th class="px-6 py-4 text-left text-sm font-bold">Role</th>
                    <th class="px-6 py-4 text-left text-sm font-bold">Actions</th>
                </tr>
            </thead>          
            <tbody class="bg-gray-50 divide-y divide-gray-200">
                @foreach($users as $index => $user)
                    <tr class="hover:bg-gray-100 transition-transform transform hover:scale-102">
                        <td class="px-6 py-4 font-medium text-gray-800 text-center">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-center">
                            <img src="{{ 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' }}" alt="{{ $user->name }}" class="w-12 h-12 rounded-full mx-auto shadow-md hover:shadow-lg transition-transform duration-300 hover:scale-110">
                        </td>
                        <td class="px-6 py-4 text-center font-medium text-gray-800">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-center text-gray-600">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 text-xs font-bold rounded-full {{ $user->role == 'admin' ? 'bg-red-600 text-white' : 'bg-blue-800 text-white' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('users.show', $user->id) }}" class="text-indigo-600 hover:text-indigo-800 font-semibold transition">View</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="ml-4 text-yellow-600 hover:text-yellow-800 font-semibold transition">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline ml-4" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold transition">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>
@endsection
