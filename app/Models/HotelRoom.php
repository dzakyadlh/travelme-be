<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelRoom extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'size',
        'bed',
        'max_guests',
        'is_refundable',
        'hotel_id',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }
}
