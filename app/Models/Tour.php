<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'price',
        'duration',
        'location',
        'address',
        'latitude',
        'longitude',
        'includes',
        'excludes',
        'itinerary',
        'max_participants',
        'difficulty_level',
        'image',
        'published'
    ];

    // Tambahkan auto-generate slug jika belum ada
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tour) {
            if (empty($tour->slug)) {
                $tour->slug = Str::slug($tour->name);
            }
        });
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}