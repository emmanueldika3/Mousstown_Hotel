<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ClientController extends Controller
{
    /**
     * Affiche le dashboard du client avec ses réservations.
     */
    public function index()
{
    $user = auth()->user();
    $myBookings = \App\Models\Booking::where('user_id', $user->id)->with('room')->latest()->get();

    // Nouvelles options : Statistiques simples
    $stats = [
        'total_spent' => $myBookings->where('is_paid', true)->sum('total_price'),
        'active_reservations' => $myBookings->where('status', 'confirmée')->count(),
    ];

    return view('clients.dashboard', compact('user', 'myBookings', 'stats'));
}

    /**
     * Permet au client d'annuler sa propre réservation (si en attente).
     */
    public function cancelBooking($id)
    {
        $booking = Booking::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Règle de sécurité : On n'annule que si c'est encore "en attente"
        if ($booking->status !== 'en_attente') {
            return back()->with('error', 'Cette réservation ne peut plus être annulée en ligne.');
        }

        $booking->update(['status' => 'annulée']);

        return back()->with('success', 'Votre réservation a été annulée.');
    }

    /**
     * Affiche le formulaire de profil.
     */
    public function profile()
    {
        return view('clients.profile', ['user' => Auth::user()]);
    }
}
