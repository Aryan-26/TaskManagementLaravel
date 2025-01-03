@extends('layouts.app')

@section('content')
<div class="min-h-full bg-gray-50">
    <!-- Main Content -->
    <main>
        <div class="mx-auto max-w-4xl px-4 py-5 sm:px-6 lg:px-8">
            <!-- Success and Error Alerts -->
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

            <!-- Form Section -->
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Add New Client</h2>

                <form class="space-y-6" action="{{ route('clientDetails.store') }}" method="POST">
                    @csrf

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name<span class="text-red-500">*</span></label>
                        <input id="name" name="name" type="text" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email<span class="text-red-500">*</span></label>
                        <input id="email" name="email" type="email" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password<span class="text-red-500">*</span></label>
                        <input id="password" name="password" type="password" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('password')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Company Name Field -->
                    <div>
                        <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name<span class="text-red-500">*</span></label>
                        <input id="company_name" name="company_name" type="text" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('company_name') }}">
                        @error('company_name')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Contact Number Field -->
                    <div>
                        <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number<span class="text-red-500">*</span></label>
                        <input id="contact_number" name="contact_number" type="text" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('contact_number') }}">
                        @error('contact_number')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg shadow-sm hover:bg-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add Client</button>
                    </div>

                    <!-- Back Button -->
                    <div>
                        <a href="{{ route('admin.dashboard') }}" class="flex justify-center w-full bg-gray-200 text-gray-700 py-2 px-4 rounded-lg shadow-sm hover:bg-gray-300 focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection
