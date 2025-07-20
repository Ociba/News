<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Category;

class NewsController extends Controller
{
    /**
     * Get all published news with pagination
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        
        $news = News::published()
            ->withMinimalSelect()
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $news
        ]);
    }

    /**
     * Get news by section
     */
    public function getBySection($sectionName)
    {
        $news = News::getSection($sectionName);

        return response()->json([
            'success' => true,
            'data' => $news
        ]);
    }


    /**
     * Get news by category with pagination
     */
    public function getByCategory($categoryName, Request $request)
    {
        $perPage = $request->input('per_page', 5);

        // Fetch category by name or slug
        $category = Category::where('name', $categoryName)->firstOrFail();

        // Fetch news items
        $news = News::getCategory($category->name, $perPage);

        // Fetch active adverts for this category
        $adverts = $category->adverts()->active()->get();

        return response()->json([
            'success' => true,
            'category' => $category->name,
            'adverts' => $adverts,
            'news' => $news,
        ]);
    }

    /**
     * Get detailed news item
     */
    public function show($id)
    {
        $news = News::getMoreNewsDetails($id)->first();

        if (!$news) {
            return response()->json([
                'success' => false,
                'message' => 'News not found or not published'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $news
        ]);
    }

}