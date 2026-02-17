<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // Liste des champs autorisés à l'écriture
   protected $fillable = [
    'name', 
    'description', 
    'price', 
    'room_type', // <-- Vérifie bien que c'est room_type ici
    'capacity', 
    'image'
];
}