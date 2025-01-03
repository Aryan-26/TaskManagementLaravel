<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('navbar')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

           
            <div class=" items-center py-20">
        @yield('content')
    </div>

        </div>
        <footer class="bg-gradient-to-r from-blue-700 via-blue-500 to-blue-300 py-8 mt-12 shadow-xl relative">
    <div class="container mx-auto px-6">
        <!-- Footer Top Section -->
        <div class="flex flex-col md:flex-row justify-between items-center">
            <!-- Footer Branding -->
            <div class="text-white font-bold text-2xl">
                <a href="{{ route('dashboard') }}">Task Management</a>
            </div>

            <!-- Navigation Links -->
            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="{{ route('dashboard') }}" class="text-white text-lg hover:text-blue-900 transition duration-300">
                    Home
                </a>
                <a href="{{ route('profile.index') }}" class="text-white text-lg hover:text-blue-900 transition duration-300">
                    Profile
                </a>
                <a href="{{ route('projects.index') }}" class="text-white text-lg hover:text-blue-900 transition duration-300">
                    Projects
                </a>
                <a href="{{ route('tasks.index') }}" class="text-white text-lg hover:text-blue-900 transition duration-300">
                    Tasks
                </a>
            </div>

            <!-- Social Media Links -->
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="#" class="text-white text-xl hover:text-blue-900 transition duration-300">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-white text-xl hover:text-blue-900 transition duration-300">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-white text-xl hover:text-blue-900 transition duration-300">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#" class="text-white text-xl hover:text-blue-900 transition duration-300">
                    <i class="fab fa-github"></i>
                </a>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-blue-200 my-6"></div>

        <!-- Copyright Section -->
        <div class="text-center text-white text-sm">
            &copy; {{ date('Y') }} Task Management. All rights reserved.
        </div>

        <!-- Background Decorative Shape -->
        <div class="absolute inset-0 pointer-events-none">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="footerGradient" x1="0" y1="0" x2="1" y2="1">
                        <stop offset="0%" stop-color="#ffffff" stop-opacity="0.1" />
                        <stop offset="100%" stop-color="#ffffff" stop-opacity="0" />
                    </linearGradient>
                </defs>
                <rect width="100%" height="100%" fill="url(#footerGradient)" />
            </svg>
        </div>
    </div>
</footer>


    </body>
</html>
