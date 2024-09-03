<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'provider',
        'account_number',
        'expiry_date',
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'user_id', 'id');
    }
}
