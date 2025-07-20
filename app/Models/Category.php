<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // use SoftDeletes;

    protected $fillable = ['category', 'created_by'];

    // Relationships
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }


    public function scopeSearchAndSort($query, $search, $sortBy)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('category', 'like', '%' . $search . '%');
        })
        ->orderBy($sortBy);
    }
}
