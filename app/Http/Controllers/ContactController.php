<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // 1. Création automatique si absente
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

        // 2. Validation
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // 3. Enregistrement
        Contact::create($validated);

        return back()->with('success', 'Félicitations ! Votre message a été enregistré.');
    }
}
