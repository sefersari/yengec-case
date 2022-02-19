<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketplace extends Model
{
    use HasFactory;

    protected $fillable = [
        'marketplace',
        'username',
        'password'
    ];

    public static $marketPlaces = [
        'n11',
        'trendyol'
    ];
}
