<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EventGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'event_date',
        'location',
        'is_active',
        'order'
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($gallery) {
            if (empty($gallery->slug)) {
                $gallery->slug = Str::slug($gallery->title);
            }
        });

        static::updating(function ($gallery) {
            if ($gallery->isDirty('title')) {
                $gallery->slug = Str::slug($gallery->title);
            }
        });
    }

    public function photos()
    {
        return $this->hasMany(GalleryPhoto::class)->orderBy('order');
    }

    public function getPhotosCountAttribute()
    {
        return $this->photos()->count();
    }
}
