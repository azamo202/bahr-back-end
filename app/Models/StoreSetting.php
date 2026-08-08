<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreSetting extends Model
{
    protected $fillable = [
        'phone',
        'whatsapp',
        'email',
        'tiktok',
        'facebook',
        'instagram',
        'youtube',
        'stats',
        'reviews',
        'working_hours',
        'faqs',
    ];

    protected $casts = [
        'phone'         => 'array',
        'stats'         => 'array',
        'reviews'       => 'array',
        'working_hours' => 'array',
        'faqs'          => 'array',
    ];
}

