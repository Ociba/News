<?php

namespace App\Http\Controllers;



class PhotoSaleController extends Controller
{
    public function photos(){
        return view('admin.photos_to_sell');
    }

    public function morePhotos(){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('front.more_photos');
    }

    public function checkout($photoId){
        return view('front.checkout',compact('photoId'));
    }

    public function photoDetails($photoId){
        return view('front.checkout_details',compact('photoId'));
    }
}
