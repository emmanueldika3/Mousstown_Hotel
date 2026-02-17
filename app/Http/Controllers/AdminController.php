<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // SUPPRIME LE CONSTRUCTEUR QUI CAUSE L'ERREUR
    
    public function index()
    {
        $stats = [
            'total'   => Booking::count(),
            'pending' => Booking::where('status', 'en_attente')->count(),
            'revenue' => Booking::where('status', 'confirme')->sum('total_price'),
            'rooms'   => Room::where('status', 'disponible')->count(),
        ];

        $bookings = Booking::with(['user', 'room'])->latest()->get();

        return view('admin.dashboard', compact('stats', 'bookings'));
    }

    public function approve($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'confirme']);
        return back()->with('success', 'Réservation confirmée.');
    }

    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'annule']);
        return back()->with('success', 'Réservation annulée.');
    }
}