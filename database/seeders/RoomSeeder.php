<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            [
                'room_number' => 'DELUXE-101', // On remplace 'name' par 'room_number'
                'type' => 'Deluxe',
                'price' => 209000, // Je suppose que c'est en CFA, donc j'ai ajusté
                'description' => 'Élégance et confort moderne avec vue jardin.',
                'image_url' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=500',
                'status' => 'disponible',
            ],
            [
                'room_number' => 'SUITE-201',
                'type' => 'Suite',
                'price' => 489000,
                'description' => 'Espace majestueux avec vue à 180° sur l\'océan.',
                'image_url' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=500',
                'status' => 'disponible',
            ],
            [
                'room_number' => 'STD-301',
                'type' => 'Standard',
                'price' => 155000,
                'description' => 'L\'essentiel du luxe Mousstown dans un cocon cosy.',
                'image_url' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=500',
                'status' => 'disponible',
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
