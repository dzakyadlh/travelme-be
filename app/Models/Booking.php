<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hotel_id',
        'hotel_room_id',
        'check_in',
        'check_out',
        'paid_amount',
        'payment_id',
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function hotel()
    {
        $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }

    public function hotel_room()
    {
        $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }

    public function payment()
    {
        $this->hasOne(Payment::class, 'booking_id', 'id');
    }
}
