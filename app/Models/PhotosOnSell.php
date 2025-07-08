<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotosOnSell extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'section_id',
        'user_id',
        'title',
        'description',
        'image_with_watermark',
        'image_without_watermark',
        'price',
        'license_type',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    protected $attributes = [
        'status' => 'publish',
        'license_type' => 'standard',
    ];

    // Relationships
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function purchases()
    {
        return $this->hasMany(PhotoPurchase::class, 'photo_id');
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'publish');
    }

    public function scopeDrafts($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeArchived($query)
    {
        return $query->where('status', 'archive');
    }

    public function incrementDownloadCount()
    {
        $this->increment('download_count');
    }
}
