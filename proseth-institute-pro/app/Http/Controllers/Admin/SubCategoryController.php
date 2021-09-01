<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroySubCategoryRequest;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;

use App\MainCategory;
use App\SubCategory;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SubCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subCategory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCategory = SubCategory::all();

        return view('admin.sub-category.index', compact('subCategory'));
    }

    public function create()
    {
        abort_if(Gate::denies('subCategory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mainCategory = MainCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sub-category.create',compact('mainCategory'));
    }

    public function store(StoreSubCategoryRequest $request)
    {
        $req = $request->all();

        $options=[];
        $img = uploadImage($request->image,'subCategory', $options);

        $req['image'] = $img;

        $subCategory = SubCategory::create($req);

        return redirect()->route('admin.sub-category.index')->with('message', 'The success message!');
    }

    public function edit(SubCategory $subCategory)
    {
        abort_if(Gate::denies('subCategory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mainCategory = MainCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subCategory->load('mainCategory');
        return view('admin.sub-category.edit', compact('subCategory','mainCategory'));
    }

    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        $req = $request->all();

        if($request->image !== null){
            $options=[];
            $req['image'] = uploadImage($request->image,'subCategory', $options);
        }

        $subCategory->update($req);

        return redirect()->route('admin.sub-category.index')->with('message', 'The success message!');
    }

    public function destroy(SubCategory $subCategory)
    {
        abort_if(Gate::denies('subCategory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroySubCategoryRequest $request)
    {
        SubCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

