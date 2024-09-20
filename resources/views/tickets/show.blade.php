<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Ticket Details') }}
        </h2>
    </x-slot>

    <!-- Container to center content and adjust width -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg px-6 py-6">
            <!-- Header Section -->
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-semibold leading-7 text-gray-900">Ticket Information</h3>
                <p class="mt-1 text-sm leading-6 text-gray-500">Details about the ticket are listed below.</p>
            </div>

            <!-- Ticket Details -->
            <div class="mt-6 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <!-- Ticket Title -->
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium text-gray-900">Ticket Title</dt>
                        <dd class="mt-1 text-sm text-gray-700 sm:col-span-2 sm:mt-0">{{ $ticket->title }}</dd>
                    </div>
                    <!-- Ticket Raised By -->
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium text-gray-900">Raised By</dt>
                        <dd class="mt-1 text-sm text-gray-700 sm:col-span-2 sm:mt-0">{{ $ticket->user->name }}</dd>
                    </div>
                    <!-- Email Address -->
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium text-gray-900">Email Address</dt>
                        <dd class="mt-1 text-sm text-gray-700 sm:col-span-2 sm:mt-0">{{ $ticket->user->email }}</dd>
                    </div>
                    <!-- Description -->
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium text-gray-900">Description</dt>
                        <dd class="mt-1 text-sm text-gray-700 sm:col-span-2 sm:mt-0">{{ $ticket->description }}</dd>
                    </div>
                    <!-- Category -->
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium text-gray-900">Category</dt>
                        <dd class="mt-1 text-sm text-gray-700 sm:col-span-2 sm:mt-0">{{ $ticket->category->name }}</dd>
                    </div>
                    <!-- Priority -->
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium text-gray-900">Priority</dt>
                        <dd class="mt-1 text-sm text-gray-700 sm:col-span-2 sm:mt-0">{{ $ticket->priority->name }}</dd>
                    </div>
                    <!-- Agent Assigned -->
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium text-gray-900">Agent Assigned</dt>
                        <dd class="mt-1 text-sm text-gray-700 sm:col-span-2 sm:mt-0">{{ $ticket->agent->name ?? 'Unassigned' }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex justify-end space-x-2">

                {{-- Back Button --}}
                <a href="{{ route('tickets.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back
                </a>

                <!-- Edit Button -->
                @can('update', $ticket)
                    <a href="{{ route('tickets.edit', $ticket) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Edit
                    </a>
                @endcan

                <!-- Delete Button (Only for Admin) -->
                @can('delete', $ticket)
                    <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this ticket?');" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Delete
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>
