<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServicesController;

/*
|--------------------------------------------------------------------------
| ROUTES PUBLIQUES
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

// Chambres
Route::get('/nos-chambres', [RoomController::class, 'showRooms'])->name('rooms.showRooms');
Route::get('/nos-chambres/categorie/{type}', [RoomController::class, 'showByCategory'])->name('rooms.category');
Route::get('/chambre-details/{id}', [HomeController::class, 'roomDetails'])->name('room.visit');

// Services (Page d'affichage publique)
// Remplace ta ligne service par ces deux-là pour être blindé :
Route::get('/services', [ServicesController::class, 'index'])->name('services.services');
Route::get('/nos-services', [ServicesController::class, 'index'])->name('services');
// Contact
Route::get('/Contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact/send', [ContactController::class, 'store'])->name('contact.store');

// Authentification Admin/Base
Route::get('/login', function () {
    return view('admin.auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);

/*
|--------------------------------------------------------------------------
| ROUTES CONNECTÉES (Utilisateurs authentifiés)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Système de Réservation de Chambres
    Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::post('/bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');

    // Réservation de Services (Action POST)
    Route::post('/services/{id}/book', [ServicesController::class, 'book'])->name('services.book');

    /* --- Espace Client (mon-espace) --- */
    Route::prefix('mon-espace')->name('client.')->group(function () {
        Route::get('/dashboard', [ClientController::class, 'index'])->name('dashboard');
        Route::get('/profil', [ClientController::class, 'profile'])->name('profile');
        Route::get('/mes-reservations', [ClientController::class, 'index'])->name('reservations');
    });
});

/*
|--------------------------------------------------------------------------
| ROUTES ADMIN
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
