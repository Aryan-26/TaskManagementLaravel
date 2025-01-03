<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-indigo-100 to-indigo-200 min-h-screen">

    <div class="flex justify-center items-center min-h-screen">
        <!-- Registration Form Container -->
        <div class="max-w-md w-full p-8 bg-white shadow-lg rounded-xl">

            <!-- Heading -->
            <h1 class="text-3xl font-semibold text-gray-800 text-center mb-6">Create Your Account</h1>

            <form action="/register" method="POST">
                <!-- CSRF Token -->
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="text" name="name" autofocus autocomplete="name" >
                    @error('name')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input id="email" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" autocomplete="username" >
                    @error('email')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password" autocomplete="new-password" >
                    @error('password')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password_confirmation" autocomplete="new-password" >
                    @error('password_confirmation')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Role -->
                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="role" name="role" >
                        <option value="" disabled selected>Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="employee">Employee</option>
                        <option value="client">Client</option>
                    </select>
                    @error('role')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Register
                    </button>
                </div>

                <!-- Login Link -->
                <div class="mt-4 text-center">
                    <span class="text-sm text-gray-600">Already have an account?</span>
                    <a href="/login" class="text-sm text-indigo-600 hover:text-indigo-700 font-semibold">Login</a>
                </div>
            </form>

        </div>
    </div>

    <script>
        // Example JavaScript for form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            let isValid = true;

            // Name Validation
            const name = document.getElementById('name');
            const nameError = document.getElementById('name-error');
            if (!name.value) {
                isValid = false;
                nameError.style.display = 'block';
            } else {
                nameError.style.display = 'none';
            }

            // Email Validation
            const email = document.getElementById('email');
            const emailError = document.getElementById('email-error');
            if (!email.value) {
                isValid = false;
                emailError.style.display = 'block';
            } else {
                emailError.style.display = 'none';
            }

            // Password Validation
            const password = document.getElementById('password');
            const passwordError = document.getElementById('password-error');
            if (!password.value) {
                isValid = false;
                passwordError.style.display = 'block';
            } else {
                passwordError.style.display = 'none';
            }

            // Confirm Password Validation
            const passwordConfirmation = document.getElementById('password_confirmation');
            const passwordConfirmationError = document.getElementById('password-confirmation-error');
            if (!passwordConfirmation.value || passwordConfirmation.value !== password.value) {
                isValid = false;
                passwordConfirmationError.style.display = 'block';
            } else {
                passwordConfirmationError.style.display = 'none';
            }

            // Role Validation
            const role = document.getElementById('role');
            const roleError = document.getElementById('role-error');
            if (!role.value) {
                isValid = false;
                roleError.style.display = 'block';
            } else {
                roleError.style.display = 'none';
            }

            // Prevent form submission if validation fails
            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>

</body>
</html>
