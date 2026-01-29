<?php
// app/Models/Article.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'gallery_images', // Ajout de la galerie
        'category',
        'author',
        'is_published',
        'is_featured',
        'published_at',
        'views',
        'meta_tags',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
        'gallery_images' => 'array', // Cast en array
        'meta_tags' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }

            if (empty($article->author)) {
                $article->author = auth()->user()->name ?? 'Admin';
            }
        });

        static::updating(function ($article) {
            if ($article->isDirty('title') && empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function incrementViews()
    {
        $this->increment('views');
    }

    public function getReadTimeAttribute()
    {
        $words = str_word_count(strip_tags($this->content));
        $minutes = ceil($words / 200);
        return $minutes;
    }

    // Méthode helper pour obtenir toutes les images
    public function getAllImages()
    {
        $images = [];

        if ($this->featured_image) {
            $images[] = $this->featured_image;
        }

        if ($this->gallery_images) {
            $images = array_merge($images, $this->gallery_images);
        }

        return $images;
    }

    // Méthode helper pour le nombre d'images
    public function getTotalImagesCount()
    {
        return count($this->getAllImages());
    }
}
