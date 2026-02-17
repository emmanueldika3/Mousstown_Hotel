<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            // --- SUITES VIP & PRESTIGE ---
            [
                'name' => 'Suite Impériale Mousstown',
                'description' => 'Le summum du luxe avec salon privé, jacuzzi et vue panoramique sur l\'estuaire du Wouri.',
                'price' => 250000, 'room_type' => 'Suite VIP', 'capacity' => 2,
                'image' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b'
            ],
            [
                'name' => 'Suite Royale Ebene',
                'description' => 'Mobilier en ébène véritable, service de majordome 24h/24 et cave à vin privée.',
                'price' => 300000, 'room_type' => 'Suite VIP', 'capacity' => 2,
                'image' => 'https://images.unsplash.com/photo-1591088398332-8a77d399c80c'
            ],
            [
                'name' => 'Penthouse Horizon',
                'description' => 'Situé au dernier étage avec une terrasse de 50m² et piscine privée.',
                'price' => 350000, 'room_type' => 'Suite VIP', 'capacity' => 2,
                'image' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2'
            ],
            [
                'name' => 'Suite Junior Safari',
                'description' => 'Ambiance chaleureuse avec touches d\'artisanat local et confort ultra-moderne.',
                'price' => 180000, 'room_type' => 'Suite', 'capacity' => 2,
                'image' => 'https://images.unsplash.com/photo-1566665797739-1674de7a421a'
            ],
            [
                'name' => 'Suite Executive Business',
                'description' => 'Espace de travail séparé, salle de réunion privée et accès au lounge VIP.',
                'price' => 200000, 'room_type' => 'Suite', 'capacity' => 1,
                'image' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304'
            ],

            // --- CHAMBRES LUXE & DELUXE ---
            [
                'name' => 'Chambre Prestige Ocean',
                'description' => 'Vue imprenable, marbre précieux et literie haut de gamme.',
                'price' => 120000, 'room_type' => 'Luxe', 'capacity' => 2,
                'image' => 'https://images.unsplash.com/photo-1618773928121-c32242e63f39'
            ],
            [
                'name' => 'Chambre Deluxe Garden',
                'description' => 'Accès direct aux jardins tropicaux et douche à l\'italienne.',
                'price' => 95000, 'room_type' => 'Luxe', 'capacity' => 2,
                'image' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427'
            ],
            [
                'name' => 'Chambre Or & Soie',
                'description' => 'Décoration raffinée aux tons dorés, idéale pour les escapades romantiques.',
                'price' => 110000, 'room_type' => 'Luxe', 'capacity' => 2,
                'image' => 'https://images.unsplash.com/photo-1540518614846-7eded433c457'
            ],
            [
                'name' => 'Chambre Panoramique Sud',
                'description' => 'Grande baie vitrée offrant un lever de soleil spectaculaire sur la ville.',
                'price' => 105000, 'room_type' => 'Luxe', 'capacity' => 2,
                'image' => 'https://images.unsplash.com/photo-1596394516093-501ba68a0ba6'
            ],
            [
                'name' => 'Chambre Miroir d\'Eau',
                'description' => 'Design épuré surplombant la piscine olympique de l\'hôtel.',
                'price' => 98000, 'room_type' => 'Luxe', 'capacity' => 2,
                'image' => 'https://images.unsplash.com/photo-1578683062331-da0ec9d70304'
            ],

            // --- CHAMBRES STANDARDS & BUSINESS ---
            [
                'name' => 'Chambre Business Class',
                'description' => 'Bureau ergonomique et fibre optique dédiée pour vos séjours pro.',
                'price' => 85000, 'room_type' => 'Standard', 'capacity' => 1,
                'image' => 'https://images.unsplash.com/photo-1595576508898-0ad5c879a061'
            ],
            [
                'name' => 'Chambre Twin Confort 101',
                'description' => 'Deux lits séparés de haute qualité, parfait pour des collègues.',
                'price' => 75000, 'room_type' => 'Standard', 'capacity' => 2,
                'image' => 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c'
            ],
            [
                'name' => 'Chambre Twin Confort 102',
                'description' => 'Confort thermique et acoustique pour un repos total.',
                'price' => 75000, 'room_type' => 'Standard', 'capacity' => 2,
                'image' => 'https://images.unsplash.com/photo-1566195992011-5f6b21e539aa'
            ],
            [
                'name' => 'Chambre Solo Voyageur',
                'description' => 'Petit cocon optimisé pour les voyageurs de passage.',
                'price' => 50000, 'room_type' => 'Standard', 'capacity' => 1,
                'image' => 'https://images.unsplash.com/photo-1505691938895-1758d7eaa511'
            ],
            [
                'name' => 'Chambre Urbaine Classique',
                'description' => 'Simplicité et élégance au meilleur prix Mousstown.',
                'price' => 60000, 'room_type' => 'Standard', 'capacity' => 2,
                'image' => 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af'
            ],

            // --- CHAMBRES FAMILIALES ---
            [
                'name' => 'Appartement Familial 201',
                'description' => 'Deux chambres, petit salon et espace jeux pour enfants.',
                'price' => 145000, 'room_type' => 'Famille', 'capacity' => 4,
                'image' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688'
            ],
            [
                'name' => 'Appartement Familial 202',
                'description' => 'Cuisine équipée et grand balcon pour des moments conviviaux.',
                'price' => 150000, 'room_type' => 'Famille', 'capacity' => 5,
                'image' => 'https://images.unsplash.com/photo-1493809842364-78817add7ffb'
            ],
            [
                'name' => 'Chambre Triple Tribu',
                'description' => 'Trois lits individuels et salle de bain spacieuse.',
                'price' => 85000, 'room_type' => 'Famille', 'capacity' => 3,
                'image' => 'https://images.unsplash.com/photo-1544124499-58912cbddaad'
            ],

            // --- SÉLECTION ADDITIONNELLE ---
            [ 'name' => 'Suite Noces de Coton', 'description' => 'Spéciale jeunes mariés.', 'price' => 220000, 'room_type' => 'Suite', 'capacity' => 2, 'image' => 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7' ],
            [ 'name' => 'Chambre Zen', 'description' => 'Ambiance japonaise, minimalisme.', 'price' => 90000, 'room_type' => 'Luxe', 'capacity' => 2, 'image' => 'https://images.unsplash.com/photo-1512918766671-ad651be9736a' ],
            [ 'name' => 'Chambre Graphite', 'description' => 'Style industriel chic.', 'price' => 70000, 'room_type' => 'Standard', 'capacity' => 2, 'image' => 'https://images.unsplash.com/photo-1560185007-cde436f6a4d0' ],
            [ 'name' => 'Suite Diamant Noir', 'description' => 'Luxe ténébreux et mystérieux.', 'price' => 280000, 'room_type' => 'Suite VIP', 'capacity' => 2, 'image' => 'https://images.unsplash.com/photo-1571508601891-ca587a71ac5a' ],
            [ 'name' => 'Chambre Azur', 'description' => 'Bleu profond et sérénité.', 'price' => 88000, 'room_type' => 'Luxe', 'capacity' => 2, 'image' => 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267' ],
            [ 'name' => 'Chambre Nomad', 'description' => 'Esprit voyageur du monde.', 'price' => 65000, 'room_type' => 'Standard', 'capacity' => 1, 'image' => 'https://images.unsplash.com/photo-1594913785162-e678ac057999' ],
            [ 'name' => 'Suite Mousstown Heritage', 'description' => 'Histoire et prestige.', 'price' => 240000, 'room_type' => 'Suite VIP', 'capacity' => 2, 'image' => 'https://images.unsplash.com/photo-1576675784201-0e142b423952' ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}