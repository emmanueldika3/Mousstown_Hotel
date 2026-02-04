<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. CRÉER UN ADMIN (Pour pouvoir te connecter)
        $admin = User::create([
            'name' => 'Admin Mousstown',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // 2. CRÉER DES CHAMBRES
        $room1 = Room::create([
            'room_number' => '101',
            'type' => 'Deluxe',
            'price' => 25000,
            'description' => 'Élégance et confort moderne avec vue jardin.',
            'image_url' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=500',
            'status' => 'disponible',
        ]);

        $room2 = Room::create([
            'room_number' => '202',
            'type' => 'Suite Panoramique',
            'price' => 55000,
            'description' => 'Espace majestueux avec vue sur l\'océan.',
            'image_url' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=500',
            'status' => 'occupé',
        ]);

        // 3. CRÉER UNE RÉSERVATION DE TEST (Lie l'admin à la chambre 101)
        Booking::create([
            'user_id' => $admin->id,
            'room_id' => $room1->id,
            'check_in' => now(),
            'check_out' => now()->addDays(3),
            'total_price' => 75000,
            'status' => 'en_attente',
        ]);

        $this->command->info('Base de données remplie avec succès !');
    }
}
