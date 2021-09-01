<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyTeamRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;

use App\Team;
use App\User;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team = Team::all();

        return view('admin.Team.index', compact('team'));
    }

    public function create()
    {
        abort_if(Gate::denies('team_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.team.create');
    }

    public function store(StoreTeamRequest $request)
    {
        $req = $request->all();

        $options=[];
        $img = uploadImage($request->profile,'team', $options);

        $req['profile'] = $img;

        $team = Team::create($req);

        return redirect()->route('admin.team.index')->with('message', 'The success message!');
    }

    public function edit(Team $team)
    {
        abort_if(Gate::denies('team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.team.edit', compact('team'));
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {

        $req = $request->all();

        if($request->profile !== null){
            $options = [];
            $req["profile"] = uploadImage($request->profile,'team', $options);
        }

        $team->update($req);
        
        return redirect()->route('admin.team.index')->with('message', 'The success message!');
    }

    public function show(Team $team)
    {
        abort_if(Gate::denies('team_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.team.show', compact('team'));
    }

    public function destroy(Team $team)
    {
        abort_if(Gate::denies('team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeamRequest $request)
    {
        Team::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
