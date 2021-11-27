<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Traits\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    use Events;
    public function index(Team $team)
    {
        return $this->calculateDateEnd(
            $team->days,
            $team->start,
            $team->weeks->pluck('code'),
            $team->holidays,
            false
        )->map(function($item) use ($team) {
            return [
                'title' => 'Aula',
                'start' => $item,
                'backgroundColor' => $team->color,
                'borderColor' => $team->color
            ];
        })->groupBy(function($item) {
            return Carbon::create($item['start'])->format('Y');
        })->transform(function($item){
            return collect($item)->groupBy(function($item) {
                return Carbon::create($item['start'])->format('m');
            })->values();
        })->values();
    }
}
