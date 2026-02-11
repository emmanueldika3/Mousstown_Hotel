<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking; // On utilise Booking au lieu de Reservation
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * Enregistre la réservation.
     */
   public function store(Request $request)
{
    // TEST : On arrête tout pour voir les données reçues
    // dd($request->all());

    $request->validate([
        'room_id'        => 'required|exists:rooms,id',
        'customer_name'  => 'required|string|max:255',
        'customer_email' => 'required|email',
        'check_in'       => 'required|date|after_or_equal:today',
        'check_out'      => 'required|date|after:check_in',
    ]);

        $room = Room::findOrFail($request->room_id);

        // Vérification de sécurité
        if ($room->status !== 'disponible') {
            return back()->with('error', 'Désolé, cette chambre n\'est plus disponible.');
        }

        // 2. Calcul du prix total
        $debut = Carbon::parse($request->check_in);
        $fin = Carbon::parse($request->check_out);
        $nuits = $debut->diffInDays($fin);
        $nuits = $nuits <= 0 ? 1 : $nuits;
        $total_price = $nuits * $room->price;

        // 3. Création dans la table BOOKINGS
        // C'est ici que la magie opère pour Dika Emmanuel
      // Dans ReservationController.php
Booking::create([
    'room_id'     => $room->id,
    'user_id'     => Auth::id(), // C'est CA qui lie la résa à Dika !
    'check_in'    => $request->check_in,
    'check_out'   => $request->check_out,
    'total_price' => $total_price,
    'status'      => 'en_attente',
    // On a enlevé customer_name et customer_email qui n'existent pas en base
]);


        // 4. Mise à jour du statut de la chambre
        $room->update(['status' => 'occupe']);

        // 5. Redirection vers le dashboard pour que le client voie son succès
        return redirect()->route('client.dashboard')->with('success', 'Félicitations Dika, votre réservation est enregistrée !');
    }
}
