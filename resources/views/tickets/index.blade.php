<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Welcome {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <!-- Add a flex container to center the content -->
    {{-- <div class="flex justify-center"> --}}
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Optionally set a max width -->
        <div class="w-full max-w-6xl">
            <livewire:ticket-table></livewire:ticket-table>
        </div>
    </div>
</x-app-layout>
