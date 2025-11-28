<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text x1 text-black leading tight">
            {{__('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 1g:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    {{ $title }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>