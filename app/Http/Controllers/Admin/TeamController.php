<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\RequestCreate;
use App\Http\Requests\Team\RequestUpdate;
use App\Models\Teacher;
use App\Models\Team;
use App\Models\Week;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::paginate(10);

        return view('admin.team.index', [
            'teams' => $teams
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $weeks = Week::all();

        return view('admin.team.create', [
            'weeks' => $weeks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCreate $request)
    {
        $data = $request->validated();

        $team = Team::create($data);

        $team->weeks()->attach($data['weeks']);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('admin.team.show', [
            'team' => $team
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $weeks = Week::all();
        return view('admin.team.edit', [
            'team' => $team,
            'weeks' => $weeks
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestUpdate $request, Team $team)
    {
        $data = $request->validated();

        $team->update($data);

        $team->weeks()->sync($data['weeks']);

        return redirect()->route('admin.teams.index');
    }

    public function addTeacher(Team $team)
    {
        $teachers = Teacher::with('user')->get();

        return view('admin.team.teacher', ['team' => $team, 'teachers' => $teachers]);
    }

    public function teacher(Request $request, Team $team)
    {
        $team->teachers()->sync($request->teacher_id);

        return redirect()->route('admin.teams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return back();
    }
}
