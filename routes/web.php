<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Customer routes (for creating and managing their own tickets)
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index'); // List customer tickets
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create'); // Show form to create a new ticket
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store'); // Submit a new ticket
    Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('tickets.show'); // View details of a specific ticket
    Route::put('/tickets/{id}', [TicketController::class, 'update'])->name('tickets.update'); // Update ticket details
});

require __DIR__.'/auth.php';
