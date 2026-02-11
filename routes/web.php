<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

// Authentification
Route::get('/login', function () {
    return view('admin.auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Affichage des chambres et catégories
Route::get('/chambres', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/categorie/{type}', [RoomController::class, 'showByCategory'])->name('rooms.category');
Route::get('/chambre-details/{id}', [HomeController::class, 'roomDetails'])->name('room.visit');

/*
|--------------------------------------------------------------------------
| SYSTÈME DE RÉSERVATION
|--------------------------------------------------------------------------
*/
Route::get('/reserver-chambre/{room_id}', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reserver-valider', [ReservationController::class, 'store'])->name('reservations.store');

/*
|--------------------------------------------------------------------------
| ROUTES CLIENTS (Connectés uniquement)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Profil utilisateur de base (Breeze/Jetstream)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Espace Privé du Client
    Route::prefix('mon-espace')->name('client.')->group(function () {
        // Cette route répond à route('client.dashboard')
        Route::get('/dashboard', [ClientController::class, 'index'])->name('dashboard');
        Route::get('/profil', [ClientController::class, 'profile'])->name('profile');

        // Alias pour le bouton "Ma Réservation"
        Route::get('/mes-reservations', [ClientController::class, 'index'])->name('reservations');
    });

    // Actions sur les réservations (Annulation)
    Route::post('/bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
});

/*
|--------------------------------------------------------------------------
| ROUTES ADMIN (Rôle Admin requis)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard principal : répond à route('admin.index')
    Route::get('/index', [AdminController::class, 'index'])->name('index');

    // Gestion des chambres (CRUD)
    Route::resource('rooms', RoomController::class);

    // Gestion des réservations (Liste et Confirmation)
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/bookings/{id}/confirm', [BookingController::class, 'confirm'])->name('bookings.confirm');
});

// Chargement des routes d'authentification
require __DIR__.'/auth.php';
