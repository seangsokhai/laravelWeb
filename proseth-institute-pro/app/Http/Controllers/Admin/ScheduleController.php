<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyScheduleRequest;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;

use App\Schedule;
use App\Instructor;
use App\Course;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ScheduleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('schedule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedule = Schedule::all();

        return view('admin.schedule.index', compact('schedule'));
    }

    public function create()
    {
        abort_if(Gate::denies('schedule_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $instructor = Instructor::all()->pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $course = Course::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.schedule.create',compact('instructor','course'));
    }

    public function store(StoreScheduleRequest $request)
    {
        $schedule = Schedule::create($request->all());

        return redirect()->route('admin.schedule.index')->with('message', 'The success message!');
    }

    public function show(Schedule $schedule)
    {
        abort_if(Gate::denies('schedule_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.schedule.show', compact('Schedule'));
    }


    public function edit(Schedule $schedule)
    {
        abort_if(Gate::denies('schedule_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $instructor = Instructor::all()->pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $course = Course::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $schedule->load('instructor','course');
        return view('admin.schedule.edit', compact('instructor','schedule','course'));
    }

    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        $schedule->update($request->all());

        return redirect()->route('admin.schedule.index')->with('message', 'The success message!');
    }

    public function destroy(Schedule $schedule)
    {
        abort_if(Gate::denies('schedule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schedule->delete();

        return back();
    }

    public function massDestroy(MassDestroyScheduleRequest $request)
    {
        Schedule::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

