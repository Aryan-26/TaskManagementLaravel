@extends('layouts.app')

@section('content')
<div class="min-h-full bg-gray-50">
    
    <!-- <header class="bg-indigo-600 shadow">
        <h1 class="text-3xl font-bold tracking-tight text-white">Client Management</h1>
        </header> -->
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between items-center">
            <a href="#" class="bg-white text-indigo-600 font-semibold py-2 px-4 rounded-lg hover:bg-indigo-100">Add Client</a>
        </div>
    
   
    <main>
        <div class="mx-auto max-w-4xl px-4 py-8 sm:px-6 lg:px-8">
          
            @if (session('success'))
                <div class="bg-green-50 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4 shadow" role="alert">
                    <span class="block sm:inline font-medium">{{ session('success') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-50 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4 shadow" role="alert">
                    <span class="block sm:inline font-medium">{{ session('error') }}</span>
                </div>
            @endif

          
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Clients List</h2>
                <table class="min-w-full divide-y divide-gray-200 table-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Company Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact Number</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($clientDetails as $client)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $client->user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $client->user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $client->company_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $client->contact_number }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <a href="#show" class="text-indigo-600 hover:text-indigo-900">View</a>
                                    <a href="" class="ml-4 text-yellow-600 hover:text-yellow-900">Edit</a>
                                    <form action="{{ route('clientDetails.destroy', $clientDetail->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
@endsection
