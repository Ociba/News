<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'category_id',
        'section_id',
        'title',
        'slug',
        'content',
        'photo',
        'status',
        'created_by',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
