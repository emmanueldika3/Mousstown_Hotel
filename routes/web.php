<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/chambres', [RoomController::class, 'index'])->name('rooms.index');

//routes pour dashboard admin


// Route simple pour le dashboard
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

// Optionnel : Si tu veux protéger l'accès uniquement aux admins connectés
/*
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});
*/



// Pour afficher ton beau formulaire
Route::get('/login', function () {
    return view('auth.login'); // Assure-toi que le fichier est dans resources/views/auth/login.blade.php
})->name('login');

// Pour traiter la soumission du formulaire
Route::post('/login', [LoginController::class, 'login']);


Route::get('/admin/rooms', [RoomController::class, 'index'])->name('admin.rooms.index');
Route::post('/admin/rooms', [RoomController::class, 'store'])->name('admin.rooms.store');

//route pour les reservations


// Routes pour les clients
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

// Espace Client
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

// Routes pour l'admin
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/bookings', [BookingController::class, 'index'])->name('admin.bookings.index');
    Route::post('/admin/bookings/{id}/confirm', [BookingController::class, 'confirm'])->name('admin.bookings.confirm');

//Route booking cancel(annulation)

Route::post('/bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
});

//rangement des routes par role

// --- ROUTES PUBLIQUES (Tout le monde) ---
Route::get('/', [HomeController::class, 'index'])->name('home');

// --- ROUTES CLIENTS (Utilisateurs connectés) ---
Route::middleware(['auth'])->prefix('mon-espace')->name('client.')->group(function () {
    Route::get('/dashboard', [ClientController::class, 'index'])->name('dashboard');
    Route::get('/profil', [ClientController::class, 'profile'])->name('profile');
});

// --- ROUTES ADMIN (Seulement le rôle admin) ---
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('rooms', RoomController::class);
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
});



// La route racine utilise maintenant le HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route pour voir une chambre en détail (pour le futur bouton "Réserver")
Route::get('/chambre/{id}', [HomeController::class, 'showRoom'])->name('rooms.details');

//category

// Route pour afficher toutes les chambres d'une catégorie cliquée
Route::get('/categorie/{type}', [HomeController::class, 'categoryRooms'])->name('rooms.category');

// Route pour le bouton "Visiter" (Détail d'une chambre précise)
Route::get('/chambre-details/{id}', [HomeController::class, 'roomDetails'])->name('room.visit');

//pour afficher les chambres par catégorie
Route::get('/categorie/{type}', [App\Http\Controllers\RoomController::class, 'showByCategory'])->name('rooms.category');

require __DIR__.'/auth.php';
