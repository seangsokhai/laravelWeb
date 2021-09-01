<?php

namespace App\Http\Controllers\Websites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Blog;
use App\Slide;
use App\Team;
use App\MainCategory;
use App\SubCategory;

class HomeController extends Controller
{
    public function index(){
        return view('websites.home.index')->with([
            "slide" => Slide::where('page_id', 1)->get(),
            "team"=> Team::get(),
            "mainCategory" => MainCategory::get(),
            "subCategory" => SubCategory::get(),
            'blog' => Blog::orderBy('id','desc')->limit(4)->get()
        ]);
    }

}
