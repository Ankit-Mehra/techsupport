<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('tickets.index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h1>All Tickets</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Assigned Agent</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->title }}</td>
                            <td>{{ $ticket->status->name }}</td>
                            <td>{{ $ticket->priority->name }}</td>
                            <td>{{ $ticket->agent ? $ticket->agent->name : 'Unassigned' }}</td>
                            <td>
                                <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info">View</a>
                                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('agent'))
                                    <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-warning">Edit</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
