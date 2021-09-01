<?php

namespace App\Http\Controllers\Websites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Schedule;
use App\Slide;

class CalendarController extends Controller
{
    public function index(){
        return view('websites.calendar.index')->with([
            "schedule" => Schedule::orderBy('id','desc')->get(),
            "slide" => Slide::where('page_id', 6)->inRandomOrder()->get(),
        ]);
    }
}
