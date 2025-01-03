@extends('layouts.app')

@section('content')
<div class="min-h-full">
        <!-- Admin Header Component -->
        <x-admin-header />

        <!-- Page Header -->
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Client</h1>
                <div class="flex gap-5 ml-auto">
                    <a href="{{ route('clientDetails.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        Add Client
                    </a>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <!-- Success and Error Alerts -->
                @if (session('success'))
                    <x-AlertSuccess :message="session('success')" />
                @endif
                @if (session('error'))
                    <x-AlertError :message="session('error')" />
                @endif

                <!-- Form Section -->
                <div class="flex min-h-full flex-col justify-center px-6 lg:px-8">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                        <h2 class="text-center text-2xl/9 font-bold tracking-tight text-gray-900">Add New Client</h2>
                    </div>
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                        <form class="space-y-6" action="{{ route('clientDetails.store') }}" method="POST">
                            @csrf

                            <!-- Name Field -->
                            <x-input-field label="Name" name="name" type="text" required="true" :value="old('name')" />

                            <!-- Email Field -->
                            <x-input-field label="Email" name="email" type="email" required="true" :value="old('email')" />

                            <!-- Password Field -->
                            <x-input-field label="Password" name="password" type="password" required="true" />

                            <!-- Role Field -->
                            <div>
                                <label for="role" class="block text-sm/6 font-medium text-gray-900">Role<span class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <select name="role" id="role" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        <option value="client">Client</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Company Name Field -->
                            <x-input-field label="Company Name" name="company_name" type="text" required="true" :value="old('company_name')" />

                            <!-- Contact Number Field -->
                            <x-input-field label="Contact Number" name="contact_number" type="text" required="true" :value="old('contact_number')" />

                            <!-- Submit Button -->
                            <div>
                                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add Client</button>
                            </div>

                            <!-- Back Button -->
                            <div>
                                <a href="{{ route('admin.dashboard') }}" class="flex w-full justify-center rounded-md bg-red-400 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
