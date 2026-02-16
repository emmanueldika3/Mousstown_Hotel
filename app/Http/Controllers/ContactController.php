<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Affiche la page de contact (C'est ce qui manquait !)
     */
    public function index()
    {
        return view('contact'); 
    }

    /**
     * Enregistre le message de contact
     */
    public function store(Request $request)
    {
        // 1. Création de la table à la volée si elle n'existe pas
        if (!Schema::hasTable('contacts')) {
            Schema::create('contacts', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email');
                $table->string('subject');
                $table->text('message');
                $table->timestamps();
            });
        }

        // 2. Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required',
        ]);

        // 3. Enregistrement dans la base de données
        Contact::create($validated);

        return back()->with('success', 'Félicitations ! Votre message a été enregistré.');
    }
}