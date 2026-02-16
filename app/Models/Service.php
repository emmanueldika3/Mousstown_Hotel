<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image'];

    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('booking_date', 'status')
                    ->withTimestamps();
    }
}
