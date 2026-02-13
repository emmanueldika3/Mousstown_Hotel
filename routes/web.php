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
| ROUTES PUBLIQUES (Accessibles à tous)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Affichage du catalogue (Ton menu Chambre)
Route::get('/nos-chambres', [RoomController::class, 'showRooms'])->name('rooms.showRooms');
// Liste filtrée par catégorie
Route::get('/nos-chambres/categorie/{type}', [RoomController::class, 'showByCategory'])->name('rooms.category');
// Détails d'une chambre spécifique
Route::get('/chambre-details/{id}', [HomeController::class, 'roomDetails'])->name('room.visit');

// Authentification
Route::get('/login', function () {
    return view('admin.auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);

/*
|--------------------------------------------------------------------------
| SYSTÈME DE RÉSERVATION (Nécessite souvent d'être connecté)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/reserver-chambre/{room_id}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reserver-valider', [ReservationController::class, 'store'])->name('reservations.store');
});

/*
|--------------------------------------------------------------------------
| ROUTES CLIENTS (Espace Personnel)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('mon-espace')->name('client.')->group(function () {
    Route::get('/dashboard', [ClientController::class, 'index'])->name('dashboard');
    Route::get('/profil', [ClientController::class, 'profile'])->name('profile');
    Route::get('/mes-reservations', [ClientController::class, 'index'])->name('reservations');

    // Annulation
    Route::post('/bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
});

/*
|--------------------------------------------------------------------------
| ROUTES ADMIN (Rôle Admin requis)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/index', [AdminController::class, 'index'])->name('index');

    // Gestion CRUD des chambres
    Route::resource('rooms', RoomController::class);

    // Gestion des réservations par l'admin
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/bookings/{id}/confirm', [BookingController::class, 'confirm'])->name('bookings.confirm');
});

require __DIR__.'/auth.php';
