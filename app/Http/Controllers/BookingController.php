<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Mail\ReservationReceived;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    /**
     * CÔTÉ CLIENT : Enregistrer une nouvelle demande de réservation
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        $room = Room::findOrFail($request->room_id);

        // Calcul de la durée et du prix total
        $start = Carbon::parse($request->check_in);
        $end = Carbon::parse($request->check_out);
        $nights = $start->diffInDays($end);

        // Sécurité : au moins 1 nuit facturée
        $nights = $nights <= 0 ? 1 : $nights;
        $total_price = $nights * $room->price;

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

    /**
     * CÔTÉ ADMIN : Liste toutes les réservations
     */
    public function index()
    {
        // On récupère les réservations avec les relations user et room
        $bookings = Booking::with(['user', 'room'])->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * CÔTÉ ADMIN : Confirmer une réservation et occuper la chambre
     */
    public function confirm($id)
    {
        $booking = Booking::findOrFail($id);

        // Mise à jour de la réservation
        $booking->update(['status' => 'confirmée']);

        // IMPORTANT : On change le statut de la chambre liée
        if ($booking->room) {
            $booking->room->update(['status' => 'occupé']);
        }

        return back()->with('success', 'Réservation confirmée. La chambre est désormais marquée comme occupée.');
    }

    /**
     * CÔTÉ CLIENT : Annuler sa propre réservation
     */
    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);

        // Sécurité 1 : Vérifier que c'est bien la réservation du client connecté
        if ($booking->user_id !== Auth::id()) {
            return back()->with('error', 'Action non autorisée.');
        }

        // Sécurité 2 : Vérifier le délai de 48h si la réservation était déjà confirmée
        if ($booking->status === 'confirmée') {
            $now = Carbon::now();
            $checkIn = Carbon::parse($booking->check_in);

            if ($now->diffInHours($checkIn, false) < 48) {
                return back()->with('error', 'Impossible d\'annuler moins de 48h avant l\'arrivée pour une réservation confirmée.');
            }
        }

        // Action : On passe en statut "annulée"
        $booking->update(['status' => 'annulée']);

        // Si la chambre était occupée, on la libère
        if ($booking->room) {
            $booking->room->update(['status' => 'disponible']);
        }

        return back()->with('success', 'Votre réservation a été annulée avec succès.');
    }


public function store(Request $request) 
{
    // ... validation et création de la réservation $booking
    
    Mail::to($booking->client_email)->send(new ReservationReceived($booking));
    
    return back()->with('success', 'Réservation enregistrée, un mail vous a été envoyé.');
}
}
