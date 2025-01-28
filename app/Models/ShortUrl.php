<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    /** @use HasFactory<\Database\Factories\ShortURLFactory> */
    use HasFactory;

    protected $fillable = [
        'original_url',
        'url_key',
        'short_url',
    ];

    public function getRouteKeyName(): string
    {
        return 'short_url';
    }
}
