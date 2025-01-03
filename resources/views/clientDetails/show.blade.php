@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen px-8">
    <div class="w-full max-w-2xl bg-white shadow-lg rounded-lg overflow-hidden p-8">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 text-center">Client Details</h1>
        </div>
        <div class="mb-6 text-center">
            <a href="{{ route('clientDetails.index') }}" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-green-500 text-white rounded-lg shadow-lg hover:from-green-500 hover:to-blue-500 transition duration-200 inline-block">
                <i class="fas fa-arrow-left mr-2"></i>Back to Clients
            </a>
        </div>
        <div class="border border-gray-200 rounded-lg p-6">
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Name:</h2>
                <p class="text-gray-600">{{ $client->name }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Email:</h2>
                <p class="text-gray-600">{{ $client->email }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Company Name:</h2>
                <p class="text-gray-600">{{ $client->company_name }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Contact Number:</h2>
                <p class="text-gray-600">{{ $client->contact_number }}</p>
            </div>
        </div>
        <div class="mt-6 flex justify-between">
            <a href="{{ route('clientDetails.edit', $client->id) }}" class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-lg shadow-lg hover:from-orange-500 hover:to-yellow-500 transition duration-200">
                <i class="fas fa-edit mr-2"></i>Edit Client
            </a>
            <form action="{{ route('clientDetails.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this client?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-gradient-to-r from-red-500 to-pink-500 text-white rounded-lg shadow-lg hover:from-pink-500 hover:to-red-500 transition duration-200">
                    <i class="fas fa-trash mr-2"></i>Delete Client
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
