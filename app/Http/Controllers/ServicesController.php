<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    /**
     * Affiche la liste des services.
     */
    public function index()
    {
        // 1. On récupère les services actifs
        $services = Service::where('is_active', true)->get();

        // 2. Si la base est vide (premier lancement), on l'initialise
        if ($services->isEmpty()) {
            $this->seedServices();
            $services = Service::where('is_active', true)->get();
        }

        return view('services.services', compact('services'));
    }

    /**
     * Initialisation des services (Logique interne)
     */
    private function seedServices()
    {
        $allServices = [
            [
                'name' => 'Le Gourmet Mousstown',
                'category' => 'Gastronomie',
                'description' => 'Une fusion entre saveurs camerounaises et haute cuisine internationale.',
                'image' => 'https://images.unsplash.com/photo-1559339352-11d035aa65de?q=80&w=1000&auto=format&fit=crop'
            ],
            [
                'name' => 'Le Sanctuaire Bien-être',
                'category' => 'Détente',
                'description' => 'Évadez-vous dans notre espace dédié. Massages aux pierres chaudes et hammam.',
                'image' => 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?auto=format&fit=crop&w=800'
            ],
            [
                'name' => 'Espace Performance',
                'category' => 'Énergie',
                'description' => 'Maintenez votre routine dans notre salle de sport équipée des dernières technologies.',
                'image' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=800'
            ],
            [
                'name' => 'Transfert Aéroport',
                'category' => 'Mobilité VIP',
                'description' => 'Dès votre atterrissage à Douala, profitez de notre navette privée avec chauffeur.',
                'image' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?q=80&w=1000&auto=format&fit=crop'
            ],
            [
                'name' => 'L’Oasis Azur',
                'category' => 'Aquatique',
                'description' => 'Une piscine à débordement chauffée avec vue panoramique sur la ville.',
                'image' => 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?auto=format&fit=crop&w=800'
            ],
            [
                'name' => 'Service en Chambre 24/7',
                'category' => 'Privilège',
                'description' => 'Le luxe s’invite à votre porte. Profitez de notre carte complète servie en suite.',
                'image' => 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?q=80&w=1000&auto=format&fit=crop'
            ]
        ];

        foreach ($allServices as $s) {
            Service::updateOrCreate(
                ['name' => $s['name']], 
                array_merge($s, ['is_active' => true])
            );
        }
    }

    /**
     * Réserver un service.
     */
    public function book(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $user = Auth::user();

        // 1. Vérifier la connexion
        if (!$user) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour réserver un service.');
        }

        // 2. Vérifier si l'utilisateur a un séjour actif
        // Note : Si ton modèle User n'a pas cette fonction, l'app va planter.
        // On vérifie donc si la méthode existe avant de l'appeler.
        if (method_exists($user, 'hasActiveStay')) {
            if (!$user->hasActiveStay()) {
                return back()->with('error', 'Désolé, ce service est réservé aux clients résidant actuellement à l\'hôtel.');
            }
        }

        // 3. Enregistrement de la demande dans la table pivot
        try {
            $user->services()->attach($service->id, [
                'booking_date' => $request->booking_date ?? now(),
                'status' => 'pending'
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la réservation : Vérifiez votre table pivot.');
        }

        return back()->with('success', 'Votre demande pour "' . $service->name . '" a bien été transmise à la conciergerie.');
    }
}