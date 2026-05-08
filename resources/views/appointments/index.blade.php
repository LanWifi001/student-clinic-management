<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Appointments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                
                <div class="mb-4">
                    @if(auth()->user()->role === 'student')
                        <a href="{{ route('appointments.create') }}" class="bg-blue-500 px-4 py-2 rounded">
                            + Request New Appointment
                        </a>
                    @endif
                </div>

                <table class="w-full border-collapse">
                    <thead>
                        <tr class="border-b">
                            @if(auth()->user()->role !== 'student')
                                <th class="text-left p-2">Student Name</th>
                            @endif
                            <th class="text-left p-2">Date & Time</th>
                            <th class="text-left p-2">Title</th>
                            <th class="text-left p-2">Reason</th>
                            <th class="text-left p-2">Status</th>
                            <th class="text-left p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr class="border-b">
                                @if(auth()->user()->role !== 'student')
                                    <td class="p-2">{{ $appointment->user->name }}</td>
                                @endif
                                <td class="p-2">{{ $appointment->appointment_date }}</td>
                                <td class="p-2">{{ $appointment->title }}</td>
                                <td class="p-2">{{ $appointment->reason }}</td>
                                <td class="p-2">
                                    <span class="px-2 py-1 rounded text-xs {{ $appointment->status === 'pending' ? 'bg-yellow-200' : 'bg-green-200' }}">
                                        {{ ucfirst($appointment->status) }}
                                    </span>
                                </td>
                                <td class="p-2">
                                    <a href="{{ route('appointments.show', $appointment) }}" class="text-blue-600">View</a>
                                    
                                    @can('update', $appointment)
                                        | <a href="{{ route('appointments.edit', $appointment) }}" class="text-indigo-600">Manage</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $appointments->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>