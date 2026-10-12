<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\{
    HomeController, 
    RoomController, 
    ServicesController, 
    BookingController, 
    ClientController,
    ReservationController,
    AdminController
};



/* --- ACCUEIL & PUBLICS --- */
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

/* --- ESPACE CONNECTÉ (Middleware Auth) --- */
Route::middleware(['auth'])->group(function () {

    // Actions Services
    Route::post('/services/{id}/book', [ServicesController::class, 'book'])->name('services.book');

    // Espace Client
   // Espace Client
Route::prefix('mon-espace')->name('clients.')->group(function () {
    Route::get('/dashboard', [ClientController::class, 'index'])->name('dashboard');
}); // <-- IL MANQUAIT CELA ICI

   // Espace Admin
Route::prefix('admin')->name('admin.')->group(function () {
    // On change 'dashboard' par 'index' ou on ajoute un alias
    Route::get('/dashboard', [RoomController::class, 'adminDashboard'])->name('index'); 
    Route::get('rooms/inventory', [RoomController::class, 'inventory'])->name('rooms.inventory');
    
    Route::resource('rooms', RoomController::class);

    Route::get('/inventory', [AdminController::class, 'index'])->name('inventory');
    Route::get('/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    Route::get('/staff', [AdminController::class, 'staff'])->name('admin.staff');
   Route::get('/clients', [AdminController::class, 'clients'])->name('clients.showclients');

   // Réservations 
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.showreservations');
    // Route pour afficher le formulaire (GET)
    Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');

    // Route pour enregistrer les données (POST)
    Route::post('/reservations/store', [ReservationController::class, 'store'])->name('reservations.store');
    //Route pour supprimer une reservation
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])
         ->name('reservations.destroy');
    //Route pour annuller une reservation
    Route::patch('/reservations/{reservation}/cancel', [ReservationController::class, 'cancel'])
         ->name('reservations.cancel');
    Route::patch('/admin/reservations/{id}/status', [ReservationController::class, 'updateStatus'])
    ->name('admin.reservations.updateStatus');
});

});

require __DIR__.'/auth.php';