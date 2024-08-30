<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'hotel_id',
    ];

    public function getUrlAttribute($url){
        return $url;
    }
}
