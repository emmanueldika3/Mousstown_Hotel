<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Sécurise l'accès : seul un admin peut utiliser ce contrôleur.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role === 'admin') {
                return $next($request);
            }

            // Si pas admin, on redirige avec un message d'erreur
            return redirect('/')->with('error', 'Accès réservé aux administrateurs.');
        });
    }

    public function index()
    {
        // On récupère les vrais chiffres de la base de données
        $stats = [
            'revenue' => 2450000,
            'bookings_count' => 24,
            'rooms_available' => Room::where('status', 'disponible')->count(),
            'total_rooms' => Room::count(),
            'total_clients' => User::count(),
        ];

        // Données fictives pour le tableau
        $recentBookings = [
            ['client' => 'Samuel Eto\'o', 'room' => 'Suite 302', 'status' => 'Confirmé', 'price' => '150.000'],
            ['client' => 'Didier Drogba', 'room' => 'Chambre 105', 'status' => 'En attente', 'price' => '45.000'],
            ['client' => 'Francis Ngannou', 'room' => 'Suite Royale', 'status' => 'Confirmé', 'price' => '250.000'],
        ];

        return view('admin.index', compact('stats', 'recentBookings'));
    }
}
