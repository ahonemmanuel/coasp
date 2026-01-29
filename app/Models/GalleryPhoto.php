<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GalleryPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_gallery_id',
        'image_path',
        'title',
        'description',
        'order'
    ];

    public function gallery()
    {
        return $this->belongsTo(EventGallery::class, 'event_gallery_id');
    }

    public function getImageUrlAttribute()
    {
        return Storage::url($this->image_path);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($photo) {
            if (Storage::exists($photo->image_path)) {
                Storage::delete($photo->image_path);
            }
        });
    }
}
