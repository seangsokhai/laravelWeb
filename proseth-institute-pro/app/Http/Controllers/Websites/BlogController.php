<?php

namespace App\Http\Controllers\Websites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\BlogTag;
use App\MainCategory;
use App\BlogCategory;
use App\Slide;

class BlogController extends Controller
{
    public function index(){
        $limitBlog = Blog::limit(4)->get();
        return view('websites.blog.index')->with([
            'blog'=> Blog::orderBy('id','desc')->paginate(6),
            'mainCategory'=> MainCategory::get(),
            'blogCategory'=> BlogCategory::get(),
            'limitBlog' => $limitBlog,
            "slide" => Slide::where('page_id', 4)->inRandomOrder()->get(),
        ]);
    }

    public function show($id){

        return view('websites.blog.show')->with([
            'blog' => Blog::findOrFail($id),
            'blogCategory'=> BlogCategory::get(),
            'limitBlog' => Blog::orderBy('id','desc')->limit(6)->get()
        ]);
    }

    public function category( $id ){

        $blog = Blog::where('blogCategory_id', $id)->paginate(6);
        $blogCategory = BlogCategory::findOrFail($id);
        $limitBlog = Blog::orderBy('id','desc')->limit(6)->get();
        $slide = Slide::where('page_id', 4)->inRandomOrder()->get();

        return view('websites.blog.blog-category', compact('blog', 'blogCategory', 'slide', 'limitBlog'));
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $blog = Blog::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->paginate(6);

        $slide = Slide::where('page_id', 4)->inRandomOrder()->get();
        $blogCategory = BlogCategory::orderBy('id','desc')->get();
        $limitBlog = Blog::orderBy('id','desc')->limit(6)->get();
    
        // Return the search view with the resluts compacted
        return view('websites.blog.blog-search', compact('blog', 'slide', 'blogCategory', 'limitBlog'));
    }
}
