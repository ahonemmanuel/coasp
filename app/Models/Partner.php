<?php
// app/Models/Partner.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'description',
        'website',
        'email',
        'phone',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Auto-générer le slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($partner) {
            if (empty($partner->slug)) {
                $partner->slug = Str::slug($partner->name);
            }
        });

        static::updating(function ($partner) {
            if ($partner->isDirty('name')) {
                $partner->slug = Str::slug($partner->name);
            }
        });
    }

    // Scope pour les partenaires actifs
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope pour l'ordre d'affichage
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('name', 'asc');
    }
}
