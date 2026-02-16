<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // Liste des champs autorisés à l'écriture
    protected $fillable = [
        'room_number', 
        'type', 
        'price', 
        'status', 
        'image_url'
    ];
}