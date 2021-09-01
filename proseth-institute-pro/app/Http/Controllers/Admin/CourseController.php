<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyCourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

use App\Course;
use App\SubCategory;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CourseController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course = Course::all();

        return view('admin.course.index', compact('course'));
    }

    public function create()
    {
        abort_if(Gate::denies('course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCategory = SubCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.course.create',compact('subCategory'));
    }

    public function store(StoreCourseRequest $request)
    {
        $req = $request->all();
        $options=[];
        $img = uploadImage($request->image,'courses', $options);

        $req['image'] = $img;

        $course = Course::create($req);
        return redirect()->route('admin.course.index')->with('message', 'The success message!');
    }

    public function show(Course $course)
    {
        abort_if(Gate::denies('course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.course.show', compact('course'));
    }


    public function edit(Course $course)
    {
        abort_if(Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCategory = SubCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $course->load('subCategory');
        return view('admin.course.edit', compact('subCategory','course'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $req = $request->all();

        if($request->image !== null){
            $options = [];
            $req["image"] = uploadImage($request->image,'course', $options);
        }
        $course->update($req);

        return redirect()->route('admin.course.index')->with('message', 'The success message!');
    }

    public function destroy(Course $course)
    {
        abort_if(Gate::denies('course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseRequest $request)
    {
        Course::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

