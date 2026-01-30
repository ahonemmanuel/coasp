<?php
// app/Models/Ally.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ally extends Model
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

        static::creating(function ($ally) {
            if (empty($ally->slug)) {
                $ally->slug = Str::slug($ally->name);
            }
        });

        static::updating(function ($ally) {
            if ($ally->isDirty('name')) {
                $ally->slug = Str::slug($ally->name);
            }
        });
    }

    // Scope pour les alliés actifs
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
