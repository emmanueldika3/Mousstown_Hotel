<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

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
            'room_number'     => 'required|unique:rooms,room_number',
            'room_type'       => 'required|string',
            'price_per_night' => 'required|numeric',
            'description'     => 'nullable|string',
            'is_available'    => 'boolean'
        ]);

        Room::create($validated);

        return back()->with('success', 'La chambre ' . $request->room_number . ' a été ajoutée avec succès !');
    }

    /**
     * Affiche les chambres par catégorie (Côté Client)
     */
    public function showByCategory($type): View
    {
        // Utilisation de room_type et is_available pour correspondre à la migration
        $rooms = Room::where('room_type', $type)
                     ->where('is_available', true)
                     ->get();

        return view('rooms.category', [
            'rooms'        => $rooms,
            'categoryName' => $type
        ]);
    }

    /**
     * Affiche le résumé des catégories
     */
    public function showRooms(): View
    {
        // CORRECTION : On utilise room_type au lieu de type
        $categories = Room::select('room_type as name')
            ->selectRaw('count(*) as count')
            ->groupBy('room_type')
            ->get();

        return view('rooms.showRooms', compact('categories'));
    }

    /**
     * Dashboard Admin
     */
    public function adminDashboard(): View
    {
        $totalRooms = Room::count();
        $availableRooms = Room::where('is_available', true)->count();
        $busyRooms = Room::where('is_available', false)->count();
        $recentRooms = Room::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalRooms', 'availableRooms', 'busyRooms', 'recentRooms'));
    }

    public function category($type)
{
    // 1. Récupérer les chambres en utilisant le nouveau nom de colonne 'room_type'
    $rooms = \App\Models\Room::where('room_type', $type)->get();

    // 2. On définit TOUTES les variantes possibles pour être sûr que Blade trouve son bonheur
    $categoryName = ucfirst($type); 

    // 3. On injecte les variables dans la vue
    return view('rooms.category', [
        'rooms' => $rooms,
        'categoryName' => $categoryName,
        'type' => $type
    ]);
}
}