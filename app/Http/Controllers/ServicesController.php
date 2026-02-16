<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function index()
    {
        if (!Schema::hasTable('services')) {
            Schema::create('services', function ($table) {
                $table->id();
                $table->string('name');
                $table->string('category')->nullable();
                $table->text('description');
                $table->string('image')->nullable();
                $table->decimal('price', 8, 2)->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        $allServices = [
            [
                'name' => 'Le Gourmet Mousstown',
                'category' => 'Gastronomie',
                'description' => 'Une fusion entre saveurs camerounaises et haute cuisine internationale. Nos chefs préparent chaque plat comme une œuvre d\'art.',
                'image' => 'https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b'
            ],
            [
                'name' => 'Le Sanctuaire Bien-être',
                'category' => 'Détente',
                'description' => 'Évadez-vous dans notre espace dédié. Massages aux pierres chaudes, hammam et rituels de soins personnalisés.',
                'image' => 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874'
            ],
            [
                'name' => 'Espace Performance',
                'category' => 'Énergie',
                'description' => 'Maintenez votre routine dans notre salle de sport équipée des dernières technologies. Coaching personnalisé disponible.',
                'image' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48'
            ],
            [
                'name' => 'Transfert Aéroport',
                'category' => 'Mobilité VIP',
                'description' => 'Dès votre atterrissage à Douala, profitez de notre navette privée. Un accueil personnalisé et sécurisé.',
                'image' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d'
            ],
            [
                'name' => 'L’Oasis Azur',
                'category' => 'Aquatique',
                'description' => 'Une piscine à débordement avec vue panoramique, chauffée à température parfaite pour vos moments de détente sous le soleil de Douala.',
                'image' => 'https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7'
            ],
            [
                'name' => 'Service en Chambre 24/7',
                'category' => 'Privilège',
                'description' => 'Le luxe s’invite à votre porte. Profitez de notre carte complète, servie dans l’intimité de votre suite, de jour comme de nuit.',
                'image' => 'https://images.unsplash.com/photo-1544148103-0773bf10d330?q=80&w=1000&auto=format&fit=crop'
            ]
        ];

        foreach ($allServices as $s) {
            $service = DB::table('services')->where('name', $s['name'])->first();

            if (!$service) {
                // Si le service n'existe pas, on l'ajoute
                DB::table('services')->insert(array_merge($s, [
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ]));
            } else {
                // SI LE SERVICE EXISTE : On force la mise à jour de l'image (pour réparer celle qui ne s'affiche pas)
                DB::table('services')->where('id', $service->id)->update(['image' => $s['image']]);
            }
        }

        $services = Service::where('is_active', true)->get();
        return view('services.services', compact('services'));
    }

    public function book(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $user = Auth::user();

        if (!$user) {
            return back()->with('error', 'Vous devez être connecté.');
        }

        if (method_exists($user, 'hasActiveStay') && !$user->hasActiveStay()) {
            return back()->with('error', 'Service réservé aux clients résidents.');
        }

        $user->services()->attach($service->id, [
            'booking_date' => $request->booking_date ?? now(),
            'status' => 'pending'
        ]);

        return back()->with('success', 'Votre demande pour ' . $service->name . ' a été envoyée !');
    }
}
