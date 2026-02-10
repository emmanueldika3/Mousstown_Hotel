<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'user_id',
        'customer_name',
        'customer_email',
        'check_in',
        'check_out',
        'total_price',
        'status'
    ];

    // Relation : Une réservation appartient à une chambre
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
