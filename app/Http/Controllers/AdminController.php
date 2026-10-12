<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking; // <-- IMPORTÉ ICI
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
 

    /**
     * Dashboard Principal : Statistiques et Vue d'ensemble
     */
    public function dashboard()
    {
        // Statistiques globales réelles
        $totalRooms = Room::count();
        $availableRooms = Room::where('status', 'disponible')->count();
        $busyRooms = Room::where('status', 'occupee')->count();
        $totalClients = User::where('role', 'client')->count();
        
        // Revenu : somme des prix de toutes les réservations
        $totalRevenue = Booking::sum('total_price'); 

        // Données pour le tableau d'activité récente
        $recentRooms = Room::latest()->take(5)->get();
        $recentBookings = Booking::with(['user', 'room'])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalRooms', 
            'availableRooms', 
            'busyRooms', 
            'totalClients',
            'recentRooms', 
            'recentBookings',
            'totalRevenue'
        ));
    }

    /**
     * Inventaire des chambres
     */
    public function rooms()
    {
        $rooms = Room::all();
        return view('admin.rooms.inventory', compact('rooms'));
    }

    /**
     * Liste des réservations
     */
    public function bookings() 
    {
        // Utilisation de paginate pour éviter de charger 1000 lignes d'un coup
        $bookings = Booking::with(['user', 'room'])->latest()->paginate(15);
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Gestion du personnel
     */
    public function staff() 
    {
        $staff = User::whereIn('role', ['admin', 'staff', 'manager', 'reception', 'menage'])->get();
        return view('admin.staff.index', compact('staff'));
    }

    /**
     * Liste des clients
     */
  public function clients()
{
    $clients = \App\Models\User::where('role', 'client')->latest()->paginate(10);
    
    // admin (dossier) . clients (sous-dossier) . showclients (ton fichier)
    return view('admin.clients.showclients', compact('clients'));
}
}