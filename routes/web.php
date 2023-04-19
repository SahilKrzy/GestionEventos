<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para eventos
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');

// Rutas para asistentes a eventos
Route::get('/events/{event}/attendees', [EventController::class, 'attendees'])->name('events.attendees');
Route::get('/events/{event}/attendees/create', [EventController::class, 'createAttendee'])->name('events.attendees.create');
Route::post('/events/{event}/attendees', [EventController::class, 'storeAttendee'])->name('events.attendees.store');
Route::delete('/events/{event}/attendees/{userEventAttendee}', [EventController::class, 'destroyAttendee'])->name('events.attendees.destroy');
