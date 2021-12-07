<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\RequestCreate;
use App\Http\Requests\Event\RequestUpdate;
use App\Models\Event;
use App\Models\Teacher;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(10);

        return view('admin.event.index', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::with('user')->get();
        $teams = Team::all()->filter(function($item) {
            return Carbon::createFromFormat('d/m/Y', $item->end)->gte(now());
        })->values();

        return view('admin.event.create', [
            'teachers' => $teachers,
            'teams' => $teams
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

        $event = Event::create($data);

        if($data['team_id']) {
            $event->teams()->attach($data['team_id']);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('admin.event.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $teachers = Teacher::with('user')->get();
        $teams = Team::all()->filter(function($item) {
            return Carbon::createFromFormat('d/m/Y', $item->end)->gte(now());
        })->values();

        return view('admin.event.edit', [
            'event' => $event,
            'teachers' => $teachers,
            'teams' => $teams
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestUpdate $request, Event $event)
    {
        $data = $request->validated();

        $event->update($data);

        $event->teams()->sync($data['team_id']);

        return redirect()->route('admin.events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        session()->put('deleted','Evento excluido com sucesso');

        return $event->delete();
    }
}
