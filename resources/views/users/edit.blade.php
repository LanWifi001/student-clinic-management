<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User Role: ') }} {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                    <div class="p-2"><strong>User Name: </strong>{{ $user->name }}</div>
                    <div class="p-2"><strong>User Email: </strong>{{ $user->email }}</div>
                    <div class="p-2"><strong>User Role: </strong>{{ $user->role }}</div>

                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="role" class="block text-sm font-medium text-gray-700">User Role</label>
                            <select name="role" id="role" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="student" @if($user->role == 'student') selected @endif>Student</option>
                                <option value="nurse" @if($user->role == 'nurse') selected @endif>Nurse</option>
                                <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                            </select>
                            @error('role') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center justify-end">
                            <a href="{{ route('users.index') }}" class="text-gray-500 hover:text-gray-700 m-2">
                                Cancel
                            </a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 m-2 rounded">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

                    