<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo_id',
        'buyer_id',
        'amount',
        'transaction_id',
        'payment_method',
        'status',
        'download_expires_at',
        'license_agreement',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'download_expires_at' => 'datetime',
    ];

    // Relationships
    public function photo()
    {
        return $this->belongsTo(PhotosOnSell::class, 'photo_id');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    // Scopes
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function isDownloadable()
    {
        return $this->status === 'completed' && 
               ($this->download_expires_at === null || $this->download_expires_at->isFuture());
    }
}