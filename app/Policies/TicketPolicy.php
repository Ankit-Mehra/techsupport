<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Ticket $ticket): bool
    {
        return $user->hasRole('admin') || $user->id === $ticket->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(['admin', 'customer', 'agent']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Ticket $ticket): bool
    {
        return $user->hasRole(['admin','agent']) || $user->id === $ticket->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ticket $ticket): bool
    {
        return $user->hasRole('admin');
    }

    public function updateStatus(User $user)
    {
        // Define logic for who can update the status
        return $user->hasRole(['admin','agent']) || $user->hasRole('agent');
    }

    public function updatePriority(User $user)
    {
        // Define logic for who can update the priority
        return $user->hasRole('admin');
    }

    public function assignAgent(User $user)
    {
        // Define logic for who can assign an agent
        return $user->hasRole('admin');
    }

}
