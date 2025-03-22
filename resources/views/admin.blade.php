<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Stats Section -->
                        <div class="bg-blue-100 p-4 rounded-lg shadow-md">
                            <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
                            <p class="text-2xl font-bold text-gray-800">{{ $totalUsers }}</p>
                        </div>
                    </div>

                    <!-- Users Table -->
                    <div class="mt-6">
                        <h3 class="text-xl font-semibold text-gray-700">Users</h3>
                        <table class="min-w-full mt-4 table-auto">
                            <thead>
                                <tr class="border-b">
                                    <th class="px-6 py-3 text-left">Name</th>
                                    <th class="px-6 py-3 text-left">Email</th>
                                    <th class="px-6 py-3 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="border-b">
                                        <td class="px-6 py-3">{{ $user->name }}</td>
                                        <td class="px-6 py-3">{{ $user->email }}</td>
                                        <td class="px-6 py-3">
                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                            |
                                            <!-- Delete Button with Confirmation Box -->
                                            <button onclick="confirmDelete({{ $user->id }})" class="text-red-500 hover:text-red-700">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Add New User Form -->
                    <div class="mt-8">
                        <h3 class="text-xl font-semibold text-gray-700">Add New User</h3>
                        <form action="{{ route('admin.users.store') }}" method="POST" class="mt-4">
                            @csrf
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="px-4 py-2 bg-blue-500 text-black rounded-lg shadow-md hover:bg-blue-700">Create User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript function to handle the delete confirmation
        function confirmDelete(userId) {
            // Show the confirmation box
            const userConfirmed = confirm("Are you sure you want to delete this user?");
            
            // If user confirms, submit the form
            if (userConfirmed) {
                // Create a hidden form dynamically and submit it
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/users/${userId}`;

                // Add the CSRF token
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                // Add the DELETE method
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);

                // Append the form to the body and submit it
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</x-app-layout>
