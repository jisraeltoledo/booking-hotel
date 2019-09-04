<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_name', 'hotel_id', 
        'room_type', 'room_image'
    ];
}