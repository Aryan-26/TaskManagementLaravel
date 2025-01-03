
 <div id="updateProfileModal" class="modal-overlay hidden fixed inset-0 flex items-center justify-center z-50">
    <div class="modal-content bg-white">
        <h3 class="text-2xl font-bold mb-4 text-center">Update Profile</h3>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="input-field mt-1">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="input-field mt-1">
            </div>
            <div class="mb-4">
                <label for="profile_image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                <input type="file" name="profile_image" id="profile_image" class="block w-full mt-1">
            </div>
            <div class="flex justify-end space-x-4">
                <button type="button" onclick="closeUpdateProfileModal()" class="button-secondary">Cancel</button>
                <button type="submit" class="button-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>