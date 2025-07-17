<?php

namespace App\Http\Controllers;


class FrontPagesController extends Controller
{
    public function category($category){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('front.category', compact('category'));
    }

    public function categoryDetails($newsId){
        if (! request()->hasValidSignature()) {
            abort(401);
        }

        return view('front.category_details', compact('newsId'));
    }

    public function moreDetails($newsId){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('front.more_news_details', compact('newsId'));
    }
}
