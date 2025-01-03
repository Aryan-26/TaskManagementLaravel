<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-indigo-100 to-indigo-200 min-h-screen flex items-center justify-center">

    <div class="max-w-sm w-full p-6 bg-white shadow-lg rounded-lg">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-800">Forgot Password?</h2>
            <p class="mt-2 text-sm text-gray-600">Enter your email below, and we’ll send you a password reset link.</p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mt-4 p-2 text-sm text-green-600 bg-green-100 border border-green-300 rounded">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="mt-6">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input id="email" name="email" type="email" 
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-6">
                <button type="submit" 
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Send Reset Link
                </button>
            </div>
        </form>

        <!-- Back to Login -->
        <div class="mt-4 text-center">
            <a href="/login" class="text-sm text-indigo-600 hover:underline">Back to Login</a>
        </div>
    </div>

</body>
</html>
