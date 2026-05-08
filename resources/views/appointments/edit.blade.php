<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Appointment Status: ') }} {{ $appointment->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                    @if(auth()->user()->role === 'student')
                        <h1 class="text-left text-black-600 p-2 text-lg">{{ auth()->user()->name }}</h1>
                    @endif
                    <div class="p-2"><strong>Appointment Date: </strong>{{ $appointment->appointment_date }}</div>
                    <div class="p-2"><strong>Appointment Title: </strong>{{ $appointment->title }}</div>
                    <div class="p-2"><strong>Appointment Reason: </strong>{{ $appointment->reason }}</div>
                    <div class="p-2"><strong>Appointment Status: </strong>
                        <span class="px-2 py-1 rounded text-xs {{ $appointment->status === 'pending' ? 'bg-yellow-200' : 'bg-green-200' }}">
                            {{ ucfirst($appointment->status) }}
                        </span>
                    </div>

                    <form action="{{ route('appointments.update', $appointment) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Medicine Name</label>
                            <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="pending" @if($appointment->status == 'pending') selected @endif>Pending</option>
                                <option value="approved" @if($appointment->status == 'approved') selected @endif>Approved</option>
                                <option value="completed" @if($appointment->status == 'completed') selected @endif>Completed</option>
                                <option value="cancelled" @if($appointment->status == 'cancelled') selected @endif>Cancelled</option>                                
                            </select>
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center justify-end">
                            <a href="{{ route('appointments.index') }}" class="text-gray-500 hover:text-gray-700 m-2">
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
