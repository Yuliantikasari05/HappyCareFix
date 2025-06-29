<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'address',
        'phone',
        'email',
        'website',
        'description',
        'services',
        'facilities',
        'operating_hours',
        'emergency_contact',
        'latitude',
        'longitude',
        'image',
        'featured',
        'active'
    ];

    protected $casts = [
        'services' => 'array',
        'facilities' => 'array',
        'doctors' => 'array',
        'operating_hours' => 'array',
        'featured' => 'boolean',
        'active' => 'boolean',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8'
    ];

    // Auto generate slug
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($hospital) {
            if (empty($hospital->slug)) {
                $hospital->slug = Str::slug($hospital->name);
            }
        });
        
        static::updating(function ($hospital) {
            if ($hospital->isDirty('name')) {
                $hospital->slug = Str::slug($hospital->name);
            }
        });
    }

    // Scope untuk filter berdasarkan type
    public function scopeGeneralHospital($query)
    {
        return $query->where('type', 'general_hospital');
    }

    public function scopeSpecialistClinic($query)
    {
        return $query->where('type', 'specialist_clinic');
    }

    public function scopeEmergencyCenter($query)
    {
        return $query->where('type', 'emergency_center');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    // Accessor untuk image URL
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return asset('images/hospital-default.jpg');
    }

    // Accessor untuk type label
    public function getTypeLabelAttribute()
    {
        $types = [
            'general_hospital' => 'Rumah Sakit Umum',
            'specialist_clinic' => 'Klinik Spesialis',
            'emergency_center' => 'Unit Gawat Darurat'
        ];

        return $types[$this->type] ?? $this->type;
    }
}