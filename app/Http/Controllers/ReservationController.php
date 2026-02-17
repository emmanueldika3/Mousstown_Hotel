<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class ReservationController extends Controller
{
    public function create($room_id)
    {
        $room = Room::findOrFail($room_id);
        return view('reservations.create', compact('room'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id'    => 'required|exists:rooms,id',
            'check_in'   => 'required|date|after_or_equal:today',
            'check_out'  => 'required|date|after:check_in',
            'email'     => 'required|email|max:255', // Validation du format email
        ]);

        $room = Room::findOrFail($request->room_id);

        if ($room->status !== 'disponible') {
            return back()->with('error', 'Désolé, cette chambre n\'est plus disponible.');
        }

        $debut = Carbon::parse($request->check_in);
        $fin = Carbon::parse($request->check_out);
        $nuits = $debut->diffInDays($fin) ?: 1;
        
        $price = $room->price_night ?? $room->price;
        $total_price = $nuits * $price;

        Booking::create([
            'room_id'     => $room->id,
            'user_id'     => Auth::id(), 
            'email'       => $request->email, // La nouvelle colonne
            'check_in'    => $request->check_in,
            'check_out'   => $request->check_out,
            'total_price' => $total_price,
            'email'   => Auth::user()->email,
            'status'      => 'en_attente',
        ]);

        $room->update(['status' => 'occupe']);

        return redirect()->route('clients.dashboard')->with('success', 'Réservation enregistrée !');
    }
    

public function approve($id)
{
    $booking = Booking::findOrFail($id);
    
    // 1. Mise à jour du statut
    $booking->update(['status' => 'confirme']);

    // 2. ENVOI DU MAIL
    // On utilise l'email stocké dans la table bookings (ou celui du user)
    Mail::to($booking->email)->send(new BookingConfirmed($booking));

    return back()->with('success', 'Réservation validée et email envoyé au client !');
}

public function downloadPDF($id)
{
    $booking = Booking::with(['user', 'room'])->findOrFail($id);
    $pdf = Pdf::loadView('pdf.facture', compact('booking'));
    return $pdf->download('facture_'.$booking->id.'.pdf');
}
}