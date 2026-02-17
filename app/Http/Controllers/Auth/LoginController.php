<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Gère la tentative de connexion
     */
    public function login(Request $request)
    {
        // 1. Validation des champs
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Tentative de connexion
        if (Auth::attempt($credentials, $request->remember)) {

            // Sécurité : Régénérer la session pour éviter les fixations de session
            $request->session()->regenerate();

            $user = Auth::user();

            // 3. REDIRECTION INTELLIGENTE SELON LE RÔLE

            // Cas Admin
            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            }

           
            // On utilise 'client.dashboard' tel que défini dans ton web.php
            return redirect()->intended(route('admin.dashboard'));
        }

        // 4. Échec de connexion
        return back()->withErrors([
            'email' => 'Identifiants incorrects pour Mousstown Hotel.',
        ])->onlyInput('email');
    }

    /**
     * Déconnexion de l'utilisateur
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
