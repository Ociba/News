<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    // use SoftDeletes;
    
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
        return $this->belongsTo(User::class,'created_by');
    }

    public function scopeWithMinimalSelect($query)
    {
        return $query->with([         // Only ID and name
            'category:id,category',    // Only ID and category name
            'section:id,section_name',            // Only ID and type name
            'author:id,name',    // Only ID and district
        ]);
    }
    public static function getSection($section_name)
    {
        return self::withMinimalSelect()
            ->whereHas('section', fn ($q) => $q->where('section_name', $section_name))
            ->whereStatus('publish')
            ->latest()
            ->limit(4)
            ->get();
    }

    public static function getSectionCategory($section_name)
    {
        return self::withMinimalSelect()
            ->whereHas('section', fn ($q) => $q->where('section_name', $section_name))
            ->whereStatus('publish')
            ->latest()
            ->limit(5)
            ->get();
    }

    public static function getCategory($category,$perPage)
    {
        return self::withMinimalSelect()
            ->whereHas('category', fn ($q) => $q->where('category', $category))
            ->whereStatus('publish')
            ->latest()
            ->paginate($perPage);
    }

    public static function getMoreNewsDetails($newsId)
    {
        return self::withMinimalSelect()
            ->whereId($newsId)
            ->whereStatus('publish')
            ->get();
    }
    public static function getCategoryNewsDetails($categoryId){
         return self::withMinimalSelect()
            ->whereId($categoryId)
            ->whereStatus('publish')
            ->get();
    }
}
