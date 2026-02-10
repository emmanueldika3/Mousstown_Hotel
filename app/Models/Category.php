<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description', // Optionnel, selon ta migration
        'image_url',   // Optionnel, pour l'image de couverture de la catégorie
    ];

    /**
     * Récupère toutes les chambres associées à cette catégorie.
     * Relation One-to-Many (Une catégorie a plusieurs chambres).
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
