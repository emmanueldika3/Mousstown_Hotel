<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RoomController extends Controller
{
    /**
     * Affiche toutes les chambres (Espace Admin)
     */
    public function index(): View
    {
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Enregistrer une nouvelle chambre
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'room_number' => 'required|unique:rooms,room_number',
            'type'        => 'required|string',
            'price'       => 'required|numeric',
            'status'      => 'required|in:disponible,occupe,maintenance',
            'image_url'   => 'nullable|url',
        ]);

        Room::create($validated);

        return back()->with('success', 'La chambre ' . $request->room_number . ' a été ajoutée avec succès !');
    }

    /**
     * Affiche les chambres par catégorie (Côté Client)
     */
    public function showByCategory($type): View
    {
        $rooms = Room::where('type', $type)
                     ->where('status', 'disponible')
                     ->get();

        return view('rooms.category', [
            'rooms'        => $rooms,
            'categoryName' => $type
        ]);
    }

    /**
     * Affiche le résumé des catégories (Page d'accueil des types)
     */
    public function showRooms(): View
    {
        $categories = Room::select('type as name')
            ->selectRaw('count(*) as count')
            ->groupBy('type')
            ->get();

        return view('rooms.showRooms', compact('categories'));
    }

    /**
     * Dashboard Admin
     */
    public function adminDashboard(): View
    {
        $totalRooms = Room::count();
        $availableRooms = Room::where('status', 'disponible')->count();
        $busyRooms = Room::where('status', 'occupe')->count();
        $recentRooms = Room::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalRooms', 'availableRooms', 'busyRooms', 'recentRooms'));
    }
} // <--- CETTE ACCOLADE FERME LA CLASSE. RIEN NE DOIT ÊTRE APRÈS.