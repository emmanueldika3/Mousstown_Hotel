<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| ROUTES PUBLIQUES
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/nos-chambres', [RoomController::class, 'showRooms'])->name('rooms.showRooms');
Route::get('/nos-chambres/categorie/{type}', [RoomController::class, 'showByCategory'])->name('rooms.category');
Route::get('/chambre-details/{id}', [HomeController::class, 'roomDetails'])->name('room.visit');

// AJOUT DE LA ROUTE SERVICES EN PUBLIC
Route::get('/services', [HomeController::class, 'services'])->name('services');

Route::get('/login', function () {
    return view('admin.auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);

/*
|--------------------------------------------------------------------------
| SYSTÈME DE RÉSERVATION
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::post('/bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
});

/*
|--------------------------------------------------------------------------
| ROUTES CLIENTS (mon-espace)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('mon-espace')->name('client.')->group(function () {
    Route::get('/dashboard', [ClientController::class, 'index'])->name('dashboard');
    Route::get('/profil', [ClientController::class, 'profile'])->name('profile');
    Route::get('/mes-reservations', [ClientController::class, 'index'])->name('reservations');
});

/*
|--------------------------------------------------------------------------
| ROUTES ADMIN (admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/index', [AdminController::class, 'index'])->name('index');
    Route::resource('rooms', RoomController::class);

    // Gestion des réservations par l'admin
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/bookings/{id}/confirm', [BookingController::class, 'confirm'])->name('bookings.confirm');
});

require __DIR__.'/auth.php';
