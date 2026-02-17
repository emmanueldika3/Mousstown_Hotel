<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
public function index()
    {
        // On récupère les réservations du client connecté avec les infos de la chambre
        $myBookings = Reservation::where('user_id', Auth::id())
            ->with('room')
            ->latest()
            ->get();

        // On retourne la vue dans le dossier 'clients' (avec s)
        return view('clients.dashboard', compact('myBookings'));
    }
}
