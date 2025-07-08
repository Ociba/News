<?php

namespace App\Http\Controllers;



class PhotoSaleController extends Controller
{
    public function photos(){
        return view('admin.photos_to_sell');
    }
}
