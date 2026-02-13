<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\View\View;
use Illuminate\Http\Request; // INDISPENSABLE pour le store
use Illuminate\Http\RedirectResponse;

class RoomController extends Controller
{
    // Afficher la liste des chambres
    public function index(): View
    {
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms'));
    }

    // Enregistrer une nouvelle chambre
    public function store(Request $request): RedirectResponse
    {
        // 1. Validation : on vérifie que les données sont correctes
        $validated = $request->validate([
    'room_number' => 'required',
    'price' => 'required|numeric',
    'description' => 'nullable',
    'status' => 'required',
]);

        // 2. Création en base de données
        Room::create($validated);

        // 3. Retour avec un message de succès
        return back()->with('success', 'La chambre ' . $request->room_number . ' a été ajoutée avec succès !');
    }

    public function showByCategory($type)
    {
        // On récupère uniquement les chambres de ce type qui sont disponibles
        $rooms = Room::where('room_type', $type)
                     ->where('status', 'disponible')
                     ->get();

        // On retourne la vue avec les données
        return view('rooms.category', [
            'rooms' => $rooms,
            'categoryName' => $type
        ]);
    }

public function showRooms()
{
    // On récupère les catégories et on compte le nombre de chambres par type
    $categories = \App\Models\Room::select('type as name')
        ->selectRaw('count(*) as count')
        ->groupBy('type')
        ->get();

    return view('rooms.showRooms', compact('categories'));
}


}
