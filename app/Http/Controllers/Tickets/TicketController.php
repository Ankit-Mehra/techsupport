<?php

namespace App\Http\Controllers\Tickets;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\Priority;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tickets.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Ticket::class);

        $categories = Category::all();
        $priorities = Priority::all();
        $statuses = Status::all();
        $agents = User::withRole('agent')->with('roles')->get();

        return view('tickets.create', compact('categories', 'priorities', 'statuses', 'agents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // can creation
        Gate::authorize('create', Ticket::class);

        // Define validation rules based on user role
        $rules = [
            'title' => 'required|string|min:10|max:255',
            'description' => 'required|string|min:20',
            'category_id' => 'required|exists:categories,id',
        ];

        if (Auth::user()->hasRole(['admin', 'agent'])) {
            $rules['priority_id'] = 'required|exists:priorities,id';
            $rules['status_id'] = 'required|exists:status,id';
        }

        if (Auth::user()->hasRole('admin')) {
            $rules['agent_id'] = 'nullable|exists:users,id';
        }

        // Validate the form data
        $validated = $request->validate($rules);

        // Assign default values for fields not set by the user
        if (!Auth::user()->hasRole(['admin', 'agent'])) {
            $defaultPriority = Priority::where('name', 'Normal')->first();
            $defaultStatus = Status::where('name', 'Open')->first();

            $validated['priority_id'] = $defaultPriority ? $defaultPriority->id : null;
            $validated['status_id'] = $defaultStatus ? $defaultStatus->id : null;
            $validated['agent_id'] = null;
        }

        // Assign the user_id to the authenticated user
        $validated['user_id'] = Auth::id();

        // Create a new ticket
        $ticket = Ticket::create($validated);

        // Redirect to the ticket page with a success message
        return redirect()->route('tickets.show', $ticket)->with('success', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {

        Gate::authorize('view', $ticket);
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        // Ensure the user is cand to update the ticket
        Gate::authorize('update', $ticket);

        // Fetch necessary data
        $categories = Category::all();
        $priorities = Priority::all();
        $statuses = Status::all();
        $agents = User::withRole('agent')->with('roles')->get();

        return view('tickets.edit', compact('ticket', 'categories', 'priorities', 'statuses', 'agents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        Gate::authorize('update', $ticket);

        // Define validation rules based on user role
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ];

        if (Auth::user()->hasRole(['admin', 'agent'])) {
            $rules['priority_id'] = 'required|exists:priorities,id';
            $rules['status_id'] = 'required|exists:statuses,id';
        }

        if (Auth::user()->hasRole('admin')) {
            $rules['agent_id'] = 'nullable|exists:users,id';
        }

        // Validate the form data
        $validated = $request->validate($rules);

        // Assign default values for fields not set by the user
        if (!Auth::user()->hasRole(['admin', 'agent'])) {
            unset($validated['priority_id'], $validated['status_id'], $validated['agent_id']);
        }

        // Update the ticket
        $ticket->update($validated);

        // Redirect to the ticket page with a success message
        return redirect()->route('tickets.show', $ticket)->with('success', 'Ticket updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        Gate::authorize('delete', $ticket);

        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully.');

    }
}
