<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Tickets\TicketController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('auth.register');
});


// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Customer routes (for creating and managing their own tickets)
Route::middleware(['auth'])->group(function () {
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index'); // List customer tickets
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create'); // Show form to create a new ticket
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store'); // Submit a new ticket
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show'); // View details of a specific ticket
    Route::get('/tickets/edit/{ticket}', [TicketController::class, 'edit'])->name('tickets.edit'); // Show form to edit a ticket
    Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update'); // Update ticket details
});

//admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy'); // Delete a ticket
});

require __DIR__.'/auth.php';
