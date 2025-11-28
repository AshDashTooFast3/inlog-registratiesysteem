<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black dark:text-black leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-black">
                    <form method="POST" action="{{ route('praktijkmanagement.update', ['id' => $user->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-gray-700 dark:text-black">Naam</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-input rounded-md shadow-sm mt-1 block w-full">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block font-medium text-sm text-black dark:text-black">E-mail</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-input rounded-md shadow-sm mt-1 block w-full">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="rolename" class="block font-medium text-sm text-black dark:text-black">Nieuw rolnaam(optioneel)</label>
                            <input type="text" name="rolename" id="rolename" value="{{ old('rolename', $user->rolename) }}" class="form-input rounded-md shadow-sm mt-1 block w-full">
                            @error('rolename')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Opslaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>