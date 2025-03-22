<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            {{-- Show only if the user is an agent --}}
            @if(auth()->user()->role == 'agent')
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <h3 class="text-lg font-medium text-gray-900">Agent Information</h3>
                        <p class="mt-1 text-sm text-gray-600">Manage your agent profile details here.</p>

                        <form method="POST" action="{{ route('agents.update', auth()->user()->agent->user_id) }}" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="mt-4">
                                <label for="license_number" class="block text-sm font-medium text-gray-700">License Number</label>
                                <input type="text" name="license_number" id="license_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('license_number', auth()->user()->license_number) }}" required>
                            </div>

                            <div class="mt-4">
                                <label for="certifications" class="block text-sm font-medium text-gray-700">Certifications (Upload Images)</label>
                                <input type="file" name="certifications[]" id="certifications" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" onchange="previewCertifications(event)">
                                <div id="certifications_preview" class="mt-4 flex space-x-2"></div>
                            </div>

                            <div class="mt-4">
                                <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                                <input type="file" name="profile_picture" id="profile_picture" class="mt-1 block w-full" accept="image/*" onchange="previewProfilePicture(event)">
                                <img id="profile_picture_preview" class="mt-4 w-64 h-64 object-cover rounded-md" style="max-width: 500px; max-height: 500px;" />
                            </div>

                            <div class="mt-4">
                                <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                                <textarea name="bio" id="bio" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('bio', auth()->user()->bio) }}</textarea>
                            </div>
                            <div class="mt-4">
                                <label for="years_experience" class="block text-sm font-medium text-gray-700">Years of Experience</label>
                                <input type="number" name="years_experience" id="years_experience" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('years_experience', auth()->user()->years_experience) }}" required>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="px-4 py-2 bg-black text-black rounded-md hover:bg-gray-800">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        function previewProfilePicture(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('profile_picture_preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function previewCertifications(event) {
            var previewContainer = document.getElementById('certifications_preview');
            previewContainer.innerHTML = '';
            Array.from(event.target.files).forEach(file => {
                var reader = new FileReader();
                reader.onload = function(){
                    var img = document.createElement('img');
                    img.src = reader.result;
                    img.classList.add('w-20', 'h-20', 'object-cover', 'rounded-md');
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
</x-app-layout>
