<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // CÔTÉ CLIENT : Enregistrer la réservation
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        $room = Room::findOrFail($request->room_id);

        // 1. Calcul de la durée et du prix total
        $start = Carbon::parse($request->check_in);
        $end = Carbon::parse($request->check_out);
        $nights = $start->diffInDays($end);
        $total_price = $nights * $room->price;

        // 2. Création de la réservation
        Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_price' => $total_price,
            'status' => 'en_attente',
        ]);

        return back()->with('success', 'Demande de réservation envoyée ! Nous vous contacterons pour la confirmation.');
    }

    // CÔTÉ ADMIN : Liste des réservations
    public function index()
    {
        $bookings = Booking::has('user')->with(['user', 'room'])->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    // CÔTÉ ADMIN : Confirmer la réservation
    public function confirm($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'confirmée']);

        // IMPORTANT : On change le statut de la chambre
        $booking->room->update(['status' => 'occupé']);

        return back()->with('success', 'Réservation confirmée. La chambre est désormais marquée comme occupée.');
    }

public function cancel($id)
{
    $booking = Booking::findOrFail($id);

    // Sécurité 1 : Vérifier que c'est bien la réservation du client connecté
    if ($booking->user_id !== auth()->id()) {
        return back()->with('error', 'Action non autorisée.');
    }

    // Sécurité 2 : Vérifier le délai (Ex: 48h avant le check-in)
    $now = Carbon::now();
    $checkIn = Carbon::parse($booking->check_in);

    if ($now->diffInHours($checkIn, false) < 48 && $booking->status == 'confirmée') {
        return back()->with('error', 'Impossible d\'annuler moins de 48h avant l\'arrivée pour une réservation confirmée. Contactez la réception.');
    }

    // Action : On passe en statut "annulée" et on libère la chambre
    $booking->update(['status' => 'annulée']);
    $booking->room->update(['status' => 'disponible']);

    return back()->with('success', 'Votre réservation a été annulée avec succès.');
}
}
