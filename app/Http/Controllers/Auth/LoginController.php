<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Affiche ton formulaire personnalisé
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->remember)) {
        $request->session()->regenerate();

        // Redirection intelligente
        $user = Auth::user();

        // Si tu as une colonne 'role' dans ta table users
        if ($user->role === 'admin' || $user->email === 'admin@gmail.com') {
            return redirect()->route('admin.index');
        }

        // Redirection vers le dashboard client que nous avons conçu
        return redirect()->intended(route('clients.index'));
    }

    return back()->withErrors([
        'email' => 'Identifiants incorrects pour Mousstown Hotel.',
    ])->onlyInput('email');
}
}
