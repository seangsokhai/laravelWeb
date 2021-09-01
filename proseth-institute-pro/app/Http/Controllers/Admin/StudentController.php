<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyStudentRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

use App\Schedule;
use App\Student;
use App\Course;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student = Student::all();

        return view('admin.student.index', compact('student'));
    }

    public function create()
    {
        abort_if(Gate::denies('student_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedule = Schedule::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');
        $course = Course::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.student.create',compact('schedule','course'));
    }

    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->all());

        return redirect()->route('admin.student.index')->with('message', 'The success message!');
    }

    public function show(Student $student)
    {
        abort_if(Gate::denies('student_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.student.show', compact('student'));
    }


    public function edit(Student $student)
    {
        abort_if(Gate::denies('student_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedule = Schedule::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');
        $course = Course::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $student->load('schedule','course');
        return view('admin.student.edit', compact('student','schedule','course'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->all());

        return redirect()->route('admin.student.index')->with('message', 'The success message!');
    }

    public function destroy(Student $student)
    {
        abort_if(Gate::denies('student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student->delete();

        return back();
    }

    public function massDestroy(MassDestroyStudentRequest $request)
    {
        Student::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

