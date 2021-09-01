<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyMainCategoryRequest;
use App\Http\Requests\StoreMainCategoryRequest;
use App\Http\Requests\UpdateMainCategoryRequest;

use App\MainCategory;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MainCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mainCategory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mainCategory = MainCategory::all();

        return view('admin.main-category.index', compact('mainCategory'));
    }

    public function create()
    {
        abort_if(Gate::denies('mainCategory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.main-category.create');
    }

    public function store(StoreMainCategoryRequest $request)
    {
        $req = $request->all();

        $options=[];
        $img = uploadImage($request->image,'mainCategory', $options);

        $req['image'] = $img;

        $mainCategory = MainCategory::create($req);

        return redirect()->route('admin.main-category.index')->with('message', 'The success message!');
    }

    public function edit(MainCategory $mainCategory)
    {
        abort_if(Gate::denies('mainCategory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.main-category.edit', compact('mainCategory'));
    }

    public function update(UpdateMainCategoryRequest $request, MainCategory $mainCategory)
    {
        $req = $request->all();

        if($request->image !== null){
            $options=[];
            $req['image'] = uploadImage($request->image,'mainCategory', $options);
        }

        $mainCategory->update($req);

        return redirect()->route('admin.main-category.index')->with('message', 'The success message!');
    }

    public function destroy(MainCategory $mainCategory)
    {
        abort_if(Gate::denies('mainCategory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mainCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyMainCategoryRequest $request)
    {
        MainCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

