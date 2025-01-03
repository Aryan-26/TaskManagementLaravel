<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-indigo-100 to-indigo-200  min-h-screen flex items-center justify-center">

    <div class="max-w-md w-full p-8 bg-white shadow-lg rounded-xl">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-semibold text-gray-800">Login to Your Account</h1>
            <p class="mt-2 text-sm text-gray-600">Enter your email and password to continue.</p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 p-2 text-sm text-green-600 bg-green-100 border border-green-300 rounded">
                {{ session('status') }}
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input id="email" type="email" name="email"  autofocus autocomplete="username"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                @error('email')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password"  autocomplete="current-password"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                @error('password')
                    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-6">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <!-- Login Button -->
            <div class="mb-4">
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Log in
                </button>
            </div>

            <!-- Forgot Password Link -->
            <div class="flex justify-between items-center">
                <a href="/forgot-password" class="text-sm text-indigo-600 hover:text-indigo-700">Forgot your password?</a>
                <!-- Sign Up Link -->
                <a href="/register" class="text-sm text-indigo-600 hover:text-indigo-700">Sign up</a>
            </div>
        </form>
    </div>

</body>
</html>
