<x-app-layout>
    <!-- Add a flex container to center the content -->
    <div class="flex justify-center">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Ticket
        </h2>
    </x-slot>

    <!-- Container to center content and adjust width -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg px-6 py-6">
            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Create Form -->
            <form action="{{ route('tickets.store') }}" method="POST">
                @csrf

                <div class="space-y-6">
                    <!-- Ticket Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Ticket Title</label>
                        <div class="mt-1">
                            <input type="text" name="title" id="title" value="{{ old('title') }}" required class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                            <textarea id="description" name="description" rows="5" required class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                        <div class="mt-1">
                            <select id="category_id" name="category_id" required class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Priority (Only for admin)-->
                    @can('updatePriority', App\Models\Ticket::class)
                    <div>
                        <label for="priority_id" class="block text-sm font-medium text-gray-700">Priority</label>
                        <div class="mt-1">
                            <select id="priority_id" name="priority_id" required class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach($priorities as $priority)
                                    <option value="{{ $priority->id }}" @selected(old('priority_id') == $priority->id)>
                                        {{ $priority->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endcan

                    <!-- Status (Only for authorized users) -->
                    @can('updateStatus', App\Models\Ticket::class)
                    <div>
                        <label for="status_id" class="block text-sm font-medium text-gray-700">Status</label>
                        <div class="mt-1">
                            <select id="status_id" name="status_id" required class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}" @selected(old('status_id') == $status->id)>
                                        {{ $status->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endcan

                    <!-- Agent Assignment (Only for Admins) -->
                    @can('assignAgent', App\Models\Ticket::class)
                    <div>
                        <label for="agent_id" class="block text-sm font-medium text-gray-700">Assign Agent</label>
                        <div class="mt-1">
                            <select id="agent_id" name="agent_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Unassigned</option>
                                @foreach($agents as $agent)
                                    <option value="{{ $agent->id }}" { agent_id == $agent->id ? 'selected' : '' }}>
                                        {{ $agent->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endcan
                </div>

                <!-- Action Buttons -->
                <div class="mt-6 flex justify-end space-x-2">
                    <a href="{{ route('tickets.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Back
                    </a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
