<?php

namespace App\Http\Controllers\Websites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\About;
use App\Team;
use App\Instructor;
use App\Slide;

class AboutController extends Controller
{
    public function index(){
        return view('websites.about.index')->with([
            "about" => About::first(),
            "team" => Team::get(),
            "instructor"=> Instructor::get(),
            "slide" => Slide::where('page_id', 2)->inRandomOrder()->get(),
        ]);
    }
}
