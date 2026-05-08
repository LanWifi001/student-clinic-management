<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white bg-white-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(auth()->user()->role === 'student')
                        <div class="p-6 text-gray-900">
                            <h3 class="text-lg font-bold text-gray-900">Your Next Appointment</h3>
                            @php $next = auth()->user()->appointments()->where('status', 'approved')->first(); @endphp
                            
                            @if($next)
                                <p class="text-gray-900">Date: {{ $next->appointment_date }}</p>
                                <p class="text-gray-900">Status: <span class="text-green-600">Confirmed</span></p>
                            @else
                                <p class="text-gray-900">No upcoming appointments. <a href="{{ route('appointments.create') }}" class="text-blue-500 underline">Book one now?</a></p>
                            @endif                    
                        </div>
                    @endif
                    @if(auth()->user()->role !== 'student')
                        <div class="p-6 text-gray-900">
                            <h3 class="text-lg font-bold text-red-600">Low Stock Alert</h3>
                            <ul>
                                @foreach(\App\Models\Medicine::where('quantity', '<', 3)->get() as $med)
                                    <li class="text-white-900">{{ $med->name }} - Only {{ $med->quantity }} left!</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
