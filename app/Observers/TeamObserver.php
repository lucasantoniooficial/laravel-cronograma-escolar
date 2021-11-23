<?php

namespace App\Observers;

use App\Models\Team;

class TeamObserver
{
    public function retrieved(Team $team)
    {
        $team->with([
            'events' => function($query) use ($team){
                $query->whereHas('teams', function($query) use ($team) {
                    $query->where('id',$team->id);
                })->orWhereHas('events', function($query) {
                    $query->where('recorrency',1);
                });
            }]);
    }

    /**
     * Handle the Team "created" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function created(Team $team)
    {
        //
    }

    /**
     * Handle the Team "updated" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function updated(Team $team)
    {
        //
    }

    /**
     * Handle the Team "deleted" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function deleted(Team $team)
    {
        //
    }

    /**
     * Handle the Team "restored" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function restored(Team $team)
    {
        //
    }

    /**
     * Handle the Team "force deleted" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function forceDeleted(Team $team)
    {
        //
    }
}
