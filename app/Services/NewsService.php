<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsService
{
    /**
     * Get all news (latest first)
     */
    public function getAllNews($perPage = 10)
    {
        return News::latest()->paginate($perPage);
    }

    /**
     * Find a single news post
     */
    public function findNews(int $id)
    {
        return News::findOrFail($id);
    }

    /**
     * Create a news post
     */
    public function createNews(array $data)
    {
        return News::create([
            'category_id' => $data['category_id'],
            'section_id'  => $data['section_id'],
            'title'       => $data['title'],
            'slug'        => Str::slug($data['title']),
            'content'     => $data['content'],
            'photo'       => $data['photo'], // ensure you've already uploaded or validated this
            'status'      => $data['status'] ?? 'publish',
            'created_by'  => Auth::id(),
        ]);
    }

    /**
     * Update an existing news post
     */
    public function updateNews(int $id, array $data)
    {
        $news = $this->findNews($id);

        $news->update([
            'category_id' => $data['category_id'],
            'section_id'  => $data['section_id'],
            'title'       => $data['title'],
            'slug'        => Str::slug($data['title']),
            'content'     => $data['content'],
            'photo'       => $data['photo'],
            'status'      => $data['status'],
        ]);

        return $news;
    }

    /**
     * Soft delete a news post
     */
    public function deleteNews(int $id)
    {
        $news = $this->findNews($id);
        return $news->delete();
    }

    /**
     * Restore soft-deleted news post (if using soft deletes in future)
     */
    public function restoreNews(int $id)
    {
        $news = News::withTrashed()->findOrFail($id);
        return $news->restore();
    }

    /**
     * Force delete a news post (permanent deletion)
     */
    public function forceDeleteNews(int $id)
    {
        $news = News::withTrashed()->findOrFail($id);
        return $news->forceDelete();
    }

    /**
     * Get all published news
     */
    public function getPublishedNews()
    {
        return News::where('status', 'publish')->latest()->get();
    }

    /**
     * Get news by category
     */
    public function getNewsByCategory(int $categoryId)
    {
        return News::where('category_id', $categoryId)->latest()->get();
    }

    /**
     * Get news by section
     */
    public function getNewsBySection(int $sectionId)
    {
        return News::where('section_id', $sectionId)->latest()->get();
    }
}
