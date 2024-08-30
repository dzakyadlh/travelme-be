<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'location',
        'rating',
        'price',
    ];

    public function gallery()
    {
        return $this->hasMany(HotelGallery::class, 'hotel_id', 'id');
    }

    public function facilities()
    {
        return $this->belongsToMany(HotelFacility::class, 'hotel_facility_mappings', 'hotel_id', 'facility_id');
    }

    public function reviews()
    {
        return $this->hasMany(HotelReview::class, 'hotel_id', 'id');
    }
}
