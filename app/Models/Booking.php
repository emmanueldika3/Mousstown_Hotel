<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // C'est cette liste qui autorise l'écriture dans la base
   protected $fillable = [
    'room_id',
    'user_id',
    'check_in',
    'check_out',
    'total_price',
    'status'
];

    // Indispensable pour que $booking->room fonctionne dans la vue
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user() {
    return $this->belongsTo(User::class);
}
}
