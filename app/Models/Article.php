<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'track',
        'title',
        'slug',
        'excerpt',
        'body',
        'order'
    ];

    // Route-model binding by slug:
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Optionally, a scope to filter by track:
    public function scopeOfTrack($query, $track)
    {
        return $query->where('track', $track)->orderBy('order');
    }
}
