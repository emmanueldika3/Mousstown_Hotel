<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
            'check_in'    => $request->check_in,
            'check_out'   => $request->check_out,
            'total_price' => $total_price,
            'status'      => 'en_attente',
        ]);

        $room->update(['status' => 'occupe']);

        return redirect()->route('clients.dashboard')->with('success', 'Réservation enregistrée !');
    }
}