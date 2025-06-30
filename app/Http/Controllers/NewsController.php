<?php

namespace App\Http\Controllers;


class NewsController extends Controller
{
    public function news(){
       return view('admin.news');
    }
}
