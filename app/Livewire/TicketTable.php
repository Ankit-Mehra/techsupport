<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Ticket;
use App\Table\Column;
use Illuminate\Support\Facades\Auth;

class TicketTable extends Table
{

    public function query() :Builder
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            // Admin sees all tickets
            return Ticket::with(['user','status', 'category', 'priority', 'agent']);

        } elseif ($user->hasRole('agent')) {
            // Agent sees tickets assigned to them
            return Ticket::with(['user','status', 'category', 'priority', 'agent'])
                        ->where('agent_id', $user->id);

        } else {
            // Customer sees only their own tickets
            return Ticket::with(['status', 'category', 'priority'])
                        ->where('user_id', $user->id);

        }
    }

    public function columns(): array
    {
        return [
            Column::make('Title', 'title')->limit(30),
            Column::make('Description', 'description')->limit(30),
            Column::make('Category', 'category.name'),
            Column::make('Status', 'status.name')->component('columns.tickets.status'),
            Column::make('Priority', 'priority.name'),
            Column::make('Agent', 'agent.name'),
            Column::make('Closed At', 'closed_at'),
            Column::make('Created At', 'created_at')->component('columns.common.human-diff'),
        ];
    }
}
