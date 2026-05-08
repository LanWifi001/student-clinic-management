<x-guest-layout>
    <div class="text-center py-10">
        <div class="flex justify-center mb-6">
            <div class="p-4 bg-blue-500 rounded-full shadow-lg shadow-blue-200">
                <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </div>
        </div>

        <h1 class="text-4xl font-extrabold text-gray-900 dark:text-gray-100 tracking-tight mb-2">
            Campus<span class="text-blue-600">Clinic</span>
        </h1>
        <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">
            Your health and wellness, managed with care. Book appointments and access clinical services with ease.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition duration-150 shadow-md">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition duration-150 shadow-md">
                        Log In
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-bold rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-150">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>

        <div class="mt-12 grid grid-cols-1 sm:grid-cols-3 gap-6 text-sm text-gray-500 dark:text-gray-400 border-t border-gray-200 dark:border-gray-700 pt-2">
            <div>
                <span class="block font-bold text-gray-800 dark:text-gray-200 uppercase tracking-widest text-[10px]">Secure</span>
                Role-based access
            </div>
            <div>
                <span class="block font-bold text-gray-800 dark:text-gray-200 uppercase tracking-widest text-[10px]">Efficient</span>
                Fast booking
            </div>
            <div>
                <span class="block font-bold text-gray-800 dark:text-gray-200 uppercase tracking-widest text-[10px]">Reliable</span>
                Medicine tracking
            </div>
        </div>
    </div>
</x-guest-layout>