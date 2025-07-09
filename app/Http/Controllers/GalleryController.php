<?php

namespace App\Http\Controllers;


class GalleryController extends Controller
{
    public function galleryPhotos(){
        return view('admin.gallery');
    }
}
