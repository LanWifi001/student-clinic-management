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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
