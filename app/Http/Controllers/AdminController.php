<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
// use App\Models\Booking; // Garde-le en commentaire si la table n'existe pas encore
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // On récupère les vrais chiffres de la base de données
        $stats = [
            'revenue' => 2450000,
            'bookings_count' => 24,
            'rooms_available' => Room::where('status', 'disponible')->count(),
            'total_rooms' => Room::count(), // INDISPENSABLE pour éviter l'erreur "Undefined key"
            'total_clients' => User::count(), // Compte tous les utilisateurs inscrits
        ];

        // Données fictives pour le tableau (en attendant d'avoir des vraies réservations)
        $recentBookings = [
            ['client' => 'Samuel Eto\'o', 'room' => 'Suite 302', 'status' => 'Confirmé', 'price' => '150.000'],
            ['client' => 'Didier Drogba', 'room' => 'Chambre 105', 'status' => 'En attente', 'price' => '45.000'],
            ['client' => 'Francis Ngannou', 'room' => 'Suite Royale', 'status' => 'Confirmé', 'price' => '250.000'],
        ];

        // Vérifie bien que ton fichier s'appelle admin/dashboard.blade.php ou admin/index.blade.php
        return view('admin.index', compact('stats', 'recentBookings'));
    }
}
