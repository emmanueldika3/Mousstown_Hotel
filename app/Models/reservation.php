<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être assignés massivement.
     * Si un champ envoyé par ton formulaire n'est pas ici, 
     * Laravel l'ignorera silencieusement lors du ->create() ou ->update().
     */
    protected $fillable = [
        'room_id',
        'user_id',       // ID de l'utilisateur s'il est connecté
        'customer_name',
        'customer_email',
        'customer_phone',
        'check_in',
        'check_out',
        'status',          // 'en attente', 'confirmée', 'annulée'
        'total_price',     // Optionnel : si tu stockes le prix final calculé
    ];

    /**
     * Relation : Une réservation appartient à une chambre
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Relation : Une réservation peut appartenir à un utilisateur (Client)
     * On utilise 'User' si ta table des clients est la table des utilisateurs
     */
    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}