<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryRoom extends Controller
{
    public function categoryRooms($type)
{
    $rooms = \App\Models\Room::where('room_type', $type)
        ->where('status', 'disponible')
        ->get();

    return view('rooms.category_list', [
        'rooms' => $rooms,
        'categoryName' => $type
    ]);
}
}
