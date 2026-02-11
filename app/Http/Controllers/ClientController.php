<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        // 1. On récupère l'ID de Dika (5)
        $userId = Auth::id();

        // 2. On récupère ses réservations avec les infos de la chambre
        // Assure-toi que le nom de la variable est EXACTEMENT $myBookings
        $myBookings = Booking::where('user_id', $userId)
            ->with('room')
            ->latest()
            ->get();

        // 3. On envoie à la vue
        return view('clients.dashboard', compact('myBookings'));
    }
}
