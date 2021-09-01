<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyInstructorRequest;
use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;

use App\Instructor;
use App\User;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class instructorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('instructor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $instructor = Instructor::all();

        return view('admin.instructor.index', compact('instructor'));
    }

    public function create()
    {
        abort_if(Gate::denies('instructor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.instructor.create');
    }

    public function store(StoreInstructorRequest $request)
    {
        $req = $request->all();

        $options=[];
        $img = uploadImage($request->profile,'instructor', $options);

        $req['profile'] = $img;

        $instructor = Instructor::create($req);

        return redirect()->route('admin.instructor.index')->with('message', 'The success message!');
    }

    public function edit(Instructor $instructor)
    {
        abort_if(Gate::denies('instructor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.instructor.edit', compact('instructor'));
    }

    public function update(UpdateInstructorRequest $request, Instructor $instructor)
    {

        $req = $request->all();

        if($request->profile !== null){
            $options = [];
            $req["profile"] = uploadImage($request->profile,'instructor', $options);
        }

        $instructor->update($req);
        
        return redirect()->route('admin.instructor.index')->with('message', 'The success message!');
    }

    public function show(Instructor $instructor)
    {
        abort_if(Gate::denies('instructor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.instructor.show', compact('instructor'));
    }

    public function destroy(instructor $instructor)
    {
        abort_if(Gate::denies('instructor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $instructor->delete();

        return back();
    }

    public function massDestroy(MassDestroyInstructorRequest $request)
    {
        Instructor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
