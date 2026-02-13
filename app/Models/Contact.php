<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array
     *
     */
   // protected $table = 'contact';
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}
