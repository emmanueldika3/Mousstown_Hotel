<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController, 
    RoomController, 
    ServicesController, 
    ReservationController,
    ClientController,
    AdminController,
    ContactController
};

/*
|--------------------------------------------------------------------------
| ROUTES PUBLIQUES (Accessibles à tous)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
// Dans routes/web.php
Route::get('/rooms/{id}', [RoomController::class, 'showRooms'])->name('room.visit');
Route::get('/nos-chambres', [RoomController::class, 'showRooms'])->name('rooms.showRooms');
Route::get('/nos-services', [ServicesController::class, 'index'])->name('services');
Route::get('/rooms/category/{type}', [RoomController::class, 'category'])->name('rooms.category');
Route::get('/admin/bookings/{id}/pdf', [ReservationController::class, 'downloadPDF'])->name('admin.bookings.pdf');

Route::get('/contact', fn() => view('contact'))->name('contact');
Route::post('/contact/send', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| AUTHENTIFICATION
|--------------------------------------------------------------------------
*/
// Si tu n'utilises pas Breeze, on garde cette route personnalisée
Route::get('/login', fn() => view('admin.auth.login'))->name('login');

/*
|--------------------------------------------------------------------------
| ROUTES PROTÉGÉES (Utilisateurs connectés)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // 1. REDIRECTION APRÈS CONNEXION
    // Cette route gère l'aiguillage selon le rôle
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('clients.dashboard');
    })->name('dashboard');

    // 2. RÉSERVATIONS (Client)
    Route::get('/reserver/{room_id}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reserver', [ReservationController::class, 'store'])->name('reservations.store');

    // 3. ESPACE CLIENT
    Route::get('/mon-espace', [ClientController::class, 'index'])->name('clients.dashboard');

    // 4. ESPACE ADMIN (Protégé par le préfixe 'admin')
    Route::prefix('admin')->name('admin.')->group(function () {
        
        // Dashboard principal (admin.dashboard)
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        
        // Actions sur les réservations (admin.bookings.approve / reject)
        Route::patch('/bookings/{id}/approve', [AdminController::class, 'approve'])->name('bookings.approve');
        Route::patch('/bookings/{id}/reject', [AdminController::class, 'reject'])->name('bookings.reject');
        
        // Gestion des chambres (admin.rooms.index, create, edit, etc.)
        Route::resource('rooms', RoomController::class);
    });

    // 5. SERVICES
    Route::post('/services/{id}/book', [ServicesController::class, 'book'])->name('services.book');

});

// Importation des routes d'authentification par défaut (Breeze/Jetstream)
require __DIR__.'/auth.php';