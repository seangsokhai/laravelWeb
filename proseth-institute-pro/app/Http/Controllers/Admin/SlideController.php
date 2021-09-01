<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySlideRequest;
use App\Http\Requests\StoreSlideRequest;
use App\Http\Requests\UpdateSlideRequest;

use App\User;
use Gate;
use App\Slide;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SlideController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('slide_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slide = Slide::all();

        return view('admin.slide.index', compact('slide'));
    }

    public function create()
    {
        abort_if(Gate::denies('slide_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.slide.create');
    }

    public function store(StoreSlideRequest $request)
    {
        $req = $request->all();

        $options=[];
        $img = uploadImage($request->image,'slide', $options);

        $req['image'] = $img;

        $slide = Slide::create($req);

        return redirect()->route('admin.slide.index')->with('message', 'The success message!');
    }

    public function edit(Slide $slide)
    {
        abort_if(Gate::denies('slide_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.slide.edit', compact('slide'));
    }

    public function update(UpdateSlideRequest $request, Slide $slide)
    {

        $req = $request->all();

        if($request->image !== null){
            $options = [];
            $req["image"] = uploadImage($request->image,'slide', $options);
        }

        $slide->update($req);
        
        return redirect()->route('admin.slide.index')->with('message', 'The success message!');
    }

    public function show(Slide $slide)
    {
        abort_if(Gate::denies('slide_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.slide.show', compact('slide'));
    }

    public function destroy(Slide $slide)
    {
        abort_if(Gate::denies('slide_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slide->delete();

        return back();
    }

    public function massDestroy(MassDestroySlideRequest $request)
    {
        Slide::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

