<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil avec les catégories dynamiques.
     */
    public function index()
{
    // On récupère tous les types uniques existants en base
    $categories = Room::whereNotNull('room_type')
        ->where('room_type', '!=', '')
        ->select('room_type')
        ->distinct()
        ->get()
        ->map(function ($room) {
            // On cherche une image d'exemple
            $exampleRoom = Room::where('room_type', $room->room_type)->first();

            return [
                'name'  => $room->room_type,
                'image' => $exampleRoom->image_url ?? 'https://via.placeholder.com/400x300?text='.$room->room_type,
                // On compte TOUTES les chambres de ce type pour être sûr de voir la carte
                'count' => Room::where('room_type', $room->room_type)->count()
            ];
        });

    return view('index', compact('categories'));
}

    /**
     * Affiche toutes les chambres d'une catégorie spécifique.
     */
    public function categoryRooms($type)
    {
        // On récupère les chambres du type sélectionné
        $rooms = Room::where('room_type', $type)
                     ->where('status', 'disponible')
                     ->get();

        return view('rooms.category_list', [
            'rooms' => $rooms,
            'type'  => $type
        ]);
    }

    /**
     * Affiche les détails (la "visite") d'une chambre précise.
     */
    public function showRoom($id)
    {
        $room = Room::findOrFail($id);

        // C'est ici qu'on affichera les 3-4 photos pour la "visite"
        return view('rooms.show', compact('room'));
    }

public function services()
    {
        return view('services.services');
    }
}
