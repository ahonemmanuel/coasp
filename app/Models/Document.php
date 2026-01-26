<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'file_path',
        'file_name',
        'file_type',
        'file_size',
        'category',
        'language',
        'download_count',
        'is_active',
        'is_featured',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'download_count' => 'integer',
        'file_size' => 'integer',
        'order' => 'integer',
    ];

    /**
     * Générer automatiquement le slug
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($document) {
            if (empty($document->slug)) {
                $document->slug = Str::slug($document->title);
            }
        });

        static::deleting(function ($document) {
            // Supprimer le fichier physique lors de la suppression
            if ($document->file_path && Storage::disk('public')->exists($document->file_path)) {
                Storage::disk('public')->delete($document->file_path);
            }
        });
    }

    /**
     * Scope pour les documents actifs
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope pour les documents en vedette
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope par catégorie
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope par langue
     */
    public function scopeByLanguage($query, $language)
    {
        return $query->where('language', $language);
    }

    /**
     * Obtenir l'URL complète du fichier
     */
    public function getFileUrlAttribute()
    {
        return Storage::url($this->file_path);
    }

    /**
     * Obtenir la taille du fichier formatée
     */
    public function getFormattedFileSizeAttribute()
    {
        if ($this->file_size < 1024) {
            return $this->file_size . ' KB';
        }
        return round($this->file_size / 1024, 2) . ' MB';
    }

    /**
     * Incrémenter le compteur de téléchargements
     */
    public function incrementDownloadCount()
    {
        $this->increment('download_count');
    }

    /**
     * Obtenir le libellé de la catégorie
     */
    public function getCategoryLabelAttribute()
    {
        $labels = [
            'declaration' => 'Déclaration',
            'rapport' => 'Rapport',
            'publication' => 'Publication',
            'guide' => 'Guide',
            'autre' => 'Autre',
        ];

        return $labels[$this->category] ?? $this->category;
    }

    /**
     * Obtenir le libellé de la langue
     */
    public function getLanguageLabelAttribute()
    {
        return $this->language === 'fr' ? 'Français' : 'English';
    }
}
