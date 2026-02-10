<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Affiche le formulaire de réservation.
     */
    public function create($room_id)
    {
        $room = Room::findOrFail($room_id);
        return view('reservations.create', compact('room'));
    }

    /**
     * Enregistre la réservation en respectant les noms des colonnes de la migration.
     */
    public function store(Request $request)
    {
        // 1. Validation alignée sur ta migration
        $request->validate([
            'room_id'        => 'required|exists:rooms,id',
            'customer_name'  => 'required|string|max:255',
            'customer_email' => 'required|email',
            'check_in'       => 'required|date|after_or_equal:today',
            'check_out'      => 'required|date|after:check_in',
        ]);

        $room = Room::findOrFail($request->room_id);

        // Vérification de sécurité pour éviter les doubles réservations
        if ($room->status !== 'disponible') {
            return back()->with('error', 'Désolé, cette chambre n\'est plus disponible.');
        }

        // 2. Calcul du prix total
        $debut = Carbon::parse($request->check_in);
        $fin = Carbon::parse($request->check_out);
        $nuits = $debut->diffInDays($fin);
        $nuits = $nuits <= 0 ? 1 : $nuits;
        $total_price = $nuits * $room->price;

        // 3. Création dans la base de données (Utilise les noms de ta migration)
        Reservation::create([
            'room_id'        => $room->id,
            'user_id'        => auth()->id(), // Optionnel : lie à l'utilisateur si connecté
            'customer_name'  => $request->customer_name,
            'customer_email' => $request->customer_email,
            'check_in'       => $request->check_in,
            'check_out'      => $request->check_out,
            'total_price'    => $total_price,
            'status'         => 'en_attente',
        ]);

        // 4. Mise à jour du statut de la chambre
        $room->update(['status' => 'occupe']);

        return redirect()->route('home')->with('success', 'Réservation enregistrée avec succès !');
    }
}
