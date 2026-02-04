<?php

namespace App\Http\Controllers;

use App\Models\Room; // On importe le modèle Room
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil avec les chambres disponibles.
     */
    public function index()
    {
        // On récupère par exemple 3 ou 6 chambres au hasard pour l'accueil
        // Ou on les groupe par type (Simple, Double, Suite)
        $rooms = Room::where('status', 'disponible')
                     ->take(6)
                     ->get();

        return view('index', compact('rooms'));
    }

    /**
     * Affiche les détails d'une chambre spécifique.
     */
    public function showRoom($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.index', compact('room'));
    }
}
