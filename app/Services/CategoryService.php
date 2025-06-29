<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryService
{
    /**
     * Get all categories
     */
    public function getAllCategories()
    {
        return Category::latest()->get();
    }

    /**
     * Find a single category
     */
    public function findCategory($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Create a new category
     */
    public function createCategory(string $name)
    {
        return Category::create([
            'category' => $name,
            'created_by' => Auth::id(),
        ]);
    }

    /**
     * Update a category
     */
    public function updateCategory(int $id, string $name)
    {
        $category = $this->findCategory($id);
        $category->update([
            'category' => $name,
        ]);

        return $category;
    }

    /**
     * Soft delete a category
     */
    public function deleteCategory(int $id)
    {
        $category = $this->findCategory($id);
        return $category->delete();
    }

    /**
     * Restore a soft-deleted category
     */
    public function restoreCategory(int $id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        return $category->restore();
    }

    /**
     * Permanently delete a soft-deleted category
     */
    public function forceDeleteCategory(int $id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        return $category->forceDelete();
    }
}
