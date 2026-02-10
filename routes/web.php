<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationController; // <--- Très important

/*
|--------------------------------------------------------------------------
| ROUTES PUBLIQUES (Tout le monde peut voir)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentification
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Affichage des chambres et catégories
Route::get('/chambres', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/categorie/{type}', [RoomController::class, 'showByCategory'])->name('rooms.category');
Route::get('/chambre-details/{id}', [HomeController::class, 'roomDetails'])->name('room.visit');

/*
|--------------------------------------------------------------------------
| SYSTÈME DE RÉSERVATION (Le coeur de ton action actuelle)
|--------------------------------------------------------------------------
*/

// Afficher le formulaire de réservation
Route::get('/reserver-chambre/{room_id}', [ReservationController::class, 'create'])->name('reservations.create');

// Enregistrer la réservation
Route::post('/reserver-valider', [ReservationController::class, 'store'])->name('reservations.store');

/*
|--------------------------------------------------------------------------
| ROUTES CLIENTS (Utilisateurs connectés)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard Client
    Route::prefix('mon-espace')->name('client.')->group(function () {
        Route::get('/dashboard', [ClientController::class, 'index'])->name('dashboard');
        Route::get('/profil', [ClientController::class, 'profile'])->name('profile');
    });

    // Annulation de réservation
    Route::post('/bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
});

/*
|--------------------------------------------------------------------------
| ROUTES ADMIN (Seulement le rôle admin)
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| ROUTES ADMIN (Seulement le rôle admin)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // On change ->name('dashboard') par ->name('index')
    // Ainsi la route devient officiellement "admin.index"
    Route::get('/index', [AdminController::class, 'index'])->name('index');

    // Gestion des chambres (CRUD complet)
    Route::resource('rooms', RoomController::class);

    // Gestion des réservations côté admin
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');

    // Correction ici aussi : le nom doit être cohérent avec le groupe admin.
    Route::post('/bookings/{id}/confirm', [BookingController::class, 'confirm'])->name('bookings.confirm');
});

// Chargement des routes d'authentification Laravel (Breeze/Jetstream)
require __DIR__.'/auth.php';
