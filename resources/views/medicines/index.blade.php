<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Medicine Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                
                <div class="mb-4">
                    <a href="{{ route('medicines.create') }}" class="bg-blue-500 px-4 py-2 rounded">
                        + Add New Medicine
                    </a>
                </div>

                <table class="w-full border-collapse ">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left p-2">Name</th>
                            <th class="text-left p-2">Description</th>
                            <th class="text-left p-2">Quantity</th>
                            <th class="text-left p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicines as $medicine)
                            <tr class="border-b">
                                <td class="p-2">{{ $medicine->name }}</td>
                                <td class="p-2">{{ $medicine->description }}</td>
                                <td class="p-2">{{ $medicine->quantity }}</td>
                                <td class="p-2">
                                    <a href="{{ route('medicines.edit', $medicine) }}" class="text-indigo-600">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('medicines.destroy', $medicine) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this medicine?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $medicines->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>