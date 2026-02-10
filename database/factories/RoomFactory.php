<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition(): array
    {
        return [
            // Génère un numéro de chambre unique entre 100 et 999
            'room_number' => $this->faker->unique()->numberBetween(100, 999),

            // On met le statut à 'disponible' pour qu'elles s'affichent sur ton site
            'status' => 'disponible',

            // Le prix sera défini plus précisément dans le Seeder,
            // mais on met une valeur par défaut ici
            'price' => $this->faker->randomElement([25000, 45000, 75000]),

            // On laisse la category_id vide ici, on la liera dans le Seeder
            'category_id' => null,
        ];
    }
}
