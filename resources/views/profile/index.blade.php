@extends('layouts.app')

@section('styles')
    <style>
       
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }

        .animate-fade-out {
            animation: fadeOut 0.5s ease-in forwards;
        }

       
        .profile-card {
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            background-color: #ffffff;
        }

        .profile-card:hover {
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.1);
        }

        
        .avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #4C72FF;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        
        .profile-header {
            font-size: 2.5rem;
            font-weight: 600;
            color: #1F2937;
        }

        .profile-subtext {
            font-size: 1.125rem;
            color: #4B5563;
        }

       
        .button-primary {
            background-color: #4C72FF;
            color: white;
            border-radius: 8px;
            padding: 0.75rem 2rem;
            font-size: 1rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .button-primary:hover {
            background-color: #3b5ee6;
            transform: translateY(-2px);
        }

        
        .profile-info {
            text-align: left;
            margin-left: 2rem;
        }

        .profile-info p {
            margin-bottom: 0.5rem;
            font-size: 1.125rem;
            color: #4B5563;
        }

        
        .modal-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            position: fixed;
            inset: 0;
            z-index: 9999; /* Make sure the modal is on top */
            display: flex; /* Initially shown */
            justify-content: center;
            align-items: center;
            visibility: hidden; /* Hidden by default */
            opacity: 0;
        }

        .modal-overlay.show {
            visibility: visible;
            opacity: 1;
            transition: opacity 0.5s ease-out;
        }

        .modal-content {
            max-width: 600px;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

      
        .modal-close {
            cursor: pointer;
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 1.5rem;
            font-weight: bold;
            color: #4C72FF;
        }
    </style>
@endsection

@section('content')
    <!-- Profile Card Section -->
    <div class="flex justify-center my-10">
        <div class="profile-card p-8 w-full sm:w-3/4 md:w-2/3 lg:w-1/2 bg-gray-100 rounded-lg shadow-md">
            <div class="flex flex-col sm:flex-row items-center sm:items-start">
                <img class="avatar w-24 h-24 rounded-full object-cover border-4 border-blue-500" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="{{ $user->name }}">

                <div class="profile-info mt-6 sm:mt-0 sm:ml-8">
                    <h1 class="profile-header text-2xl font-bold mb-2">{{ $user->name  }} <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $user->role == 'admin' ? 'bg-red-600 text-white' : 'bg-blue-600 text-white' }}">
                                {{ ucfirst($user->role) }}
                            </span> </h1>
                    <p class="profile-subtext text-lg text-gray-600">{{ $user->email }}</p>
                    <p class="profile-subtext text-lg text-gray-600">{{ $user->number }}</p>
                    <td class="px-6 py-4 text-center">
                           
                        </td>

                    <!-- <div class="mt-6">
                        <button onclick="openUpdateProfileModal()" class="button-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Profile</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

   
    <div id="updateProfileModal" class="flex justify-center my-10">
        <div class="modal-content p-8 w-full max-w-lg bg-white rounded-lg shadow-md">
            <span class="modal-close absolute top-4 right-4 text-2xl font-bold cursor-pointer" onclick="closeUpdateProfileModal()">&times;</span>
            <h2 class="text-2xl font-bold mb-4">Update Profile</h2>
            <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="name" class="block text-lg font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="input-field mt-1 w-full p-2 border border-gray-400 rounded-lg">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="input-field mt-1 w-full p-2 border border-gray-400 rounded-lg">
                </div>

                

                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeUpdateProfileModal()" class="button-secondary bg-gray-200 hover:bg-gray-300 text-gray-600 font-bold py-2 px-4 rounded">Cancel</button>
                    <button type="submit" class="button-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
      
        const openUpdateProfileModal = () => {
            const modal = document.getElementById('updateProfileModal');
            modal.classList.add('show');
        };

        
        const closeUpdateProfileModal = () => {
            const modal = document.getElementById('updateProfileModal');
            modal.classList.remove('show');
        };
    </script>
@endsection
