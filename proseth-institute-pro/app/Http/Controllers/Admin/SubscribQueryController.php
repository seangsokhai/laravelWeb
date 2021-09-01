<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubscribQueryRequest;
use App\Http\Requests\MassDestroySubscribQueryRequest;

use App\Schedule;
use App\SubscribQuery;
use App\Course;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SubscribQueryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subscrib_query_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscrib_query = SubscribQuery::all();

        return view('admin.subscrib-query.index', compact('subscrib_query'));
    }

    public function show(SubscribQuery $subscrib_query)
    {
        abort_if(Gate::denies('subscrib_query_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subscrib-query.show', compact('subscrib_query'));
    }

    public function destroy(SubscribQuery $subscrib_query)
    {
        abort_if(Gate::denies('subscrib_query_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscrib_query->delete();
        return back();
    }

    public function massDestroy(MassDestroySubscribQueryRequest $request)
    {
        Email::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

}

