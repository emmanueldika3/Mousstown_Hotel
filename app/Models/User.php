<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Service;
use App\Models\RoomBooking;

class User extends Authenticatable
{


    protected $fillable = [
        'name',
        'first_name', // OBLIGATOIRE
        'email',
        'phone',      // OBLIGATOIRE
        'password',
        'role',
    ];

    /**
     * Les attributs cachés pour la sérialisation.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Le cast des attributs.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // --- RELATIONS ---

    /**
     * Relation avec les réservations de chambres (Un utilisateur a plusieurs réservations)
     */
    public function roomBookings()
    {
        return $this->hasMany(RoomBooking::class);
    }

    /**
     * Relation avec les services de l'hôtel (Relation Many-to-Many via table pivot)
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_user')
                    ->withPivot('status', 'booking_date')
                    ->withTimestamps();
    }

    // --- LOGIQUE MÉTIER (LOGIC) ---

    /**
     * Vérifie si l'utilisateur possède les droits administrateur
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Vérifie si l'utilisateur est actuellement un résident VIP
     * (A au moins une réservation de chambre confirmée)
     */
    public function hasActiveStay(): bool
    {
        // Option 1 : Logique stricte (doit avoir une réservation confirmée)
        return $this->roomBookings()->where('status', 'confirmed')->exists();


    }
}
