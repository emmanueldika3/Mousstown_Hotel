<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function dashboard()
    {
        // On récupère les réservations du client connecté avec les infos de la chambre
        $myBookings = Booking::where('user_id', Auth::id())
            ->with('room')
            ->latest()
            ->get();

        // On utilise uniquement 'reservations'
        return view('clients.dashboard', compact('reservations'));
    }

    // On fait pointer l'index vers le dashboard pour éviter les doublons
    public function index()
    {
        return $this->dashboard();
    }
}