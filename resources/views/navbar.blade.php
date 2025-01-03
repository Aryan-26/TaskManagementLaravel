<nav class="fixed w-full bg-gradient-to-r from-blue-700 via-blue-500 to-blue-300 shadow-md z-50">
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
      
            <div class="text-2xl font-bold text-white">
            @auth
            @if (Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}">Admin</a>
                @elseif(Auth::user()->role === 'employee')
                <a href="{{ route('employee.dashboard') }}">Employee</a>
                @elseif(Auth::user()->role === 'client')
                <a href="{{ route('client.dashboard') }}">Client</a>
                @endif
                @endauth
            </div>

          
            <div class="hidden md:flex space-x-6">
                @auth
                    @if (Auth::user()->role === 'admin')
                        <a href="${ route('admin.dashboard') }" class="text-white font-medium hover: hover:text-blue-900 transition duration-300">Dashboard</a>
                        <a href="{{ route('users.index') }}" class="text-white font-medium hover: hover:text-blue-900 transition duration-300">Users</a>
                        <a href="{{ route('tasks.index') }}" class="text-white font-medium hover: hover:text-blue-900 transition duration-300">Tasks</a>
                        <a href="{{ route('projects.index') }}" class="text-white font-medium hover: hover:text-blue-900 transition duration-300">Projects</a>
                        <a href="{{ route('client.index') }}" class="text-white font-medium hover: hover:text-blue-900 transition duration-300">Clients</a>
                        <a href="{{ route('employee.index') }}" class="text-white font-medium hover: hover:text-blue-900 transition duration-300">Employees</a>
                    @elseif(Auth::user()->role === 'employee')
                        <a href="{{ route('tasks.index') }}" class="text-white font-medium hover: hover:text-blue-900 transition duration-300">Tasks</a>
                        <a href="{{ route('projects.index') }}" class="text-white font-medium hover: hover:text-blue-900 transition duration-300">Projects</a>
                    @elseif(Auth::user()->role === 'client')
                        <a href="{{ route('projects.index') }}" class="text-white font-medium hover: hover:text-blue-900 transition duration-300">Projects</a>
                    @endif
                @endauth
            </div>

         
            <div class="relative hidden md:flex items-center" x-data="{ open: false }">
                <span @click="open = !open" class="mr-3 text-white font-semibold cursor-pointer hover:text-blue-100 transition duration-300">
                    {{ Auth::user()->name }}
                </span>
                <div class="relative">
                    <i class="fas fa-user-circle text-2xl text-white cursor-pointer hover:text-blue-100 transition duration-300" @click="open = !open"></i>
                    <div x-show="open" @click.away="open = false" 
                         class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg py-2 z-50">
                        <a href="{{ route('profile.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 transition duration-200">
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100 transition duration-200">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>

          
            <div x-data="{ open: false }" class="relative md:hidden">
                <button @click="open = !open" class="text-white focus:outline-none">
                    <svg x-show="!open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

               
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-95"
                     class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg py-2 z-50"
                     @click.away="open = false">
                    <a href="{{ route('profile.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 transition duration-200">Profile</a>
                    <form method="POST" action="{{ route('logout') }}" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100 transition duration-200">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
