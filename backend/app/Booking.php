<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'room_id', 'date_start', 'date_end', 'customer_fullname', 'customer_email', 'customer_phone', 'total_nights', 'total_price', 'user_id'
    ];
}
