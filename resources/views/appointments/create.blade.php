<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Make New Appointment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('appointments.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Appointment Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="reason" class="block text-sm font-medium text-gray-700">Reason</label>
                        <textarea name="reason" id="reason" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('reason') }}</textarea>
                        @error('reason') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="appointment_date" class="block text-sm font-medium text-gray-700">Preferred Date & Time</label>
                        <input type="datetime-local" name="appointment_date" id="appointment_date" 
                            value="{{ old('appointment_date') }}" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('appointment_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center justify-end">
                        <a href="{{ route('appointments.index') }}" class="text-gray-500 hover:text-gray-700 m-2">
                            Cancel
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded m-2">
                            Save Appointment
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>