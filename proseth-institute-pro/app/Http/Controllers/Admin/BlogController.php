<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MassDestroyBlogClassRequest;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;

use App\User;
use App\Blog;
use App\BlogCategory;
use App\BlogTag;
use App\Blog_BlogTag;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blog = Blog::all();
        return view('admin.blog.index', compact('blog'));
    }

    public function create()
    {
        abort_if(Gate::denies('blog_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $blogCategory = BlogCategory::all();
        $blogTag = BlogTag::all();
        $user = auth()->user();

        return view('admin.blog.create', compact('blogTag','user','blogCategory'));
    }

    public function store(StoreBlogRequest $request)
    {
        $req = $request->all();
        $options=[];
        $img = uploadImage($request->image,'blogs', $options);
        $req['image'] = $img;

        // $req['blogTag_id'] = implode("-",$req['blogTag_id']);
        
        $blog = Blog::create($req);
        $blog->blogTag()->attach($req['blogTag_id']);

        return redirect()->route('admin.blog.index')->with('message', 'The success message!');
    }

    public function show(Blog $blog)
    {
        abort_if(Gate::denies('blog_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blog.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        abort_if(Gate::denies('blog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $blogCategory = BlogCategory::all()->pluck('title', 'id');
        $blogTag = BlogTag::all()->pluck('title', 'id');
        $user = auth()->user();

        $blog->load('blogCategory','blogTag','user');
        return view('admin.blog.edit', compact('blog','blogCategory','blogTag','user'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $req = $request->all();

        if($request->image !== null){
            $options = [];
            $req["image"] = uploadImage($request->image,'blogs', $options);
        }
        $blog->update($req);
        $blog->blogTag()->attach($req['blogTag_id']);
        return redirect()->route('admin.blog.index')->with('message', 'The success message!');
    }

    public function destroy(Blog $blog)
    {
        abort_if(Gate::denies('blog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blog->delete();

        return back();
    }

    public function massDestroy(MassDestroyBlogClassRequest $request)
    {
        Blog::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
