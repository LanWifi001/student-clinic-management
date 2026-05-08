<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Medicine') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('medicines.update', $medicine) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Medicine Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $medicine->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="quantity" class="block text-sm font-medium text-gray-700">Stock Quantity</label>
                        <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $medicine->quantity) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('quantity') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $medicine->description) }}</textarea>
                        @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center justify-end">
                        <button>
                            <a href="{{ route('medicines.index') }}" class="text-gray-500 hover:text-gray-700 m-2">
                                Cancel
                            </a>
                        </button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 m-2 rounded">
                            Save Medicine
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>