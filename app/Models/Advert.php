<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advert extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'section_id',
        'category_id',
        'image',
        'start_date',
        'end_date',
        'advert_status',
        'user_id'
    ];

    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'end_date' => 'date:Y-m-d',
    ];

    protected $attributes = [
        'advert_status' => 'publish',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function scopeActive($query)
    {
        return $query->where('advert_status', 'publish')
                    ->whereDate('start_date', '<=', now())
                    ->whereDate('end_date', '>=', now());
    }

    public static function scopeDraft($query)
    {
        return $query->where('advert_status', 'draft');
    }

    public static function scopeArchived($query)
    {
        return $query->where('advert_status', 'archive');
    }
}