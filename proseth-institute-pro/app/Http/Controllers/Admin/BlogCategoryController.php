<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyBlogCategoryClassRequest;
use App\Http\Requests\StoreBlogCategoryRequest;
use App\Http\Requests\UpdateBlogCategoryRequest;

use App\BlogCategory;
use App\MainCategory;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class BlogCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('blogCategory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogCategory = BlogCategory::all();

        return view('admin.blog_category.index', compact('blogCategory'));
    }

    public function create()
    {
        abort_if(Gate::denies('blogCategory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.blog_category.create');
    }

    public function store(StoreBlogCategoryRequest $request)
    {
        $blogCategory = BlogCategory::create($request->all());

        return redirect()->route('admin.blog_category.index')->with('message', 'The success message!');
    }

    public function edit(BlogCategory $blogCategory)
    {
        abort_if(Gate::denies('blogCategory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.blog_category.edit', compact('blogCategory'));
    }

    public function update(UpdateBlogCategoryRequest $request, BlogCategory $blogCategory)
    {
        $blogCategory->update($request->all());
        return redirect()->route('admin.blog_category.index')->with('message', 'The success message!');
    }

    public function destroy(Blog $blog)
    {
        abort_if(Gate::denies('blogCategory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogCategory->delete();
        return back();
    }

    public function massDestroy(MassDestroyBlogCategoryClassRequest $request)
    {
        BlogCategory::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
