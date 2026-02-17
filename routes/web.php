<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\{
    HomeController, 
    RoomController, 
    ServicesController, 
    BookingController, 
    ClientController
};


/* --- ACCUEIL & PUBLICS --- */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/nos-chambres', [RoomController::class, 'showRooms'])->name('rooms.showRooms');
Route::get('/nos-services', [ServicesController::class, 'index'])->name('services');

// Route pour afficher le formulaire
// Dans routes/web.php, remplace ta ligne Contact par celle-ci :
Route::get('/contact', function () {
    return view('contact'); // Assure-toi que le fichier est bien resources/views/contact.blade.php
})->name('contact');

// Route pour envoyer les données (C'est celle-ci qui manque !)
Route::post('/contact/send', [ContactController::class, 'store'])->name('contact.store');


/* --- AUTHENTIFICATION --- */
Route::get('/login', fn() => view('admin.auth.login'))->name('login');

/* --- ESPACE CONNECTÉ (Middleware Auth) --- */
Route::middleware(['auth'])->group(function () {

    // Actions Services
    Route::post('/services/{id}/book', [ServicesController::class, 'book'])->name('services.book');

    // Espace Client
    Route::prefix('mon-espace')->name('client.')->group(function () {
        Route::get('/dashboard', [ClientController::class, 'index'])->name('dashboard');
    });

   // Espace Admin
Route::prefix('admin')->name('admin.')->group(function () {
    // On change 'dashboard' par 'index' ou on ajoute un alias
    Route::get('/dashboard', [RoomController::class, 'adminDashboard'])->name('index'); 
    Route::resource('rooms', RoomController::class);
});

});

require __DIR__.'/auth.php';