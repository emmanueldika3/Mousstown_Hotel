<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Service; // Assurez-vous que ce modèle existe
use App\Models\RoomBooking; // Importez votre modèle de réservation de chambre

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'name',
        'prenom',
        'email',
        'phone',
        'password',
        'role', // N'oubliez pas d'ajouter 'role' si vous l'utilisez
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // --- RELATIONS ---

    /**
     * Relation avec les réservations de chambres
     */
    public function roomBookings()
    {
        return $this->hasMany(RoomBooking::class);
    }

    /**
     * Relation avec les services de l'hôtel (Spa, Resto, etc.)
     */
    public function services()
    {
        // Correction : On utilise le modèle Service de Laravel, pas l'interface Symfony
        return $this->belongsToMany(Service::class, 'service_user')
                    ->withPivot('booking_date', 'status')
                    ->withTimestamps();
    }

    // --- LOGIQUE MÉTIER ---

    /**
     * Vérifie si l'utilisateur est administrateur
     */
    public function isAdmin() {
        return $this->role === 'admin';
    }

    /**
     * Vérifie si l'utilisateur a un séjour actif (VIP)
     * Utile pour autoriser ou non la réservation de services en chambre
     */
    public function hasActiveStay() {
        // Vérifie s'il existe une réservation confirmée pour cet utilisateur
        return $this->roomBookings()->where('status', 'confirmed')->exists();
    }
}
