<?php

namespace App\Http\Controllers\Websites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\StoreSubscribQueryRequest;
use App\Course;
use App\Schedule;
use App\SubCategory;
use App\MainCategory;
use App\Student;
use App\SubscribQuery;
use App\Slide;
use App\Mail\WelcomeMail;
use App\Mail\SubscribMail;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{
    public function index(){
        return view('websites.course.index')->with([
            "mainCategory" => MainCategory::get(),
            "subCategory" => SubCategory::get(),
            "schedule" => Schedule::get(),
            "slide" => Slide::where('page_id', 3)->inRandomOrder()->get(),
        ]);
    }

    public function show($id){
        return view('websites.course.show')->with([
            "schedule" => Schedule::findOrFail($id)
        ]);
    }

    public function storeStudent(StoreStudentRequest $request)
    {
        $student = Student::create($request->all());
        Mail::to('email@email.com')->send( new WelcomeMail( $student ));
        return redirect()->route('course')->with('message', 'The success message!');
    }

    public function storeSubscribQuery(StoreSubscribQueryRequest $request)
    {
        $subscrib_query = SubscribQuery::create($request->all());
        Mail::to('email@email.com')->send( new SubscribMail( $subscrib_query ));
        return redirect()->route('course')->with('message', 'The success message!');
    }

    public function category( $id ){

        $courses = Course::where('subCategory_id', $id)->get();
        $subCategory = subCategory::findOrFail($id);
        $slide = Slide::where('page_id', 3)->inRandomOrder()->get();

        // dd($courses);

        return view('websites.course.show-sub-category', compact('courses', 'subCategory', 'slide'));
    }
}
