<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelFacility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon'
    ];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_facility_mappings', 'facility_id', 'hotel_id');
    }
}
