<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('events.index'); 
Route::get('/events/create', [App\Http\Controllers\EventController::class, 'create'])->name('events.create'); 
Route::post('/events/create/store',[App\Http\Controllers\EventController::class,'store'])->name('events.store');
Route::get('/events/{id}', [App\Http\Controllers\EventController::class, 'show'])->name('events.show');
Route::get('/events/{id}/edit', [App\Http\Controllers\EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{id}', [App\Http\Controllers\EventController::class, 'update'])->name('events.update');
Route::delete('/events/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->name('events.destroy');
Route::get('/events/{id}/register', [App\Http\Controllers\EventController::class, 'register'])->name('events.register');
Route::post('/events/{id}/attendees',[App\Http\Controllers\EventController::class,'storeAttendee'])->name('events_users.store');