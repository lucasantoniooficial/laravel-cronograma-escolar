<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','code','start','hours','color'];

    protected $casts = [
        'start' => 'datetime:d/m/Y'
    ];

    protected $with = ['events','weeks'];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'team_teacher');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class,'event_team','teams_id','event_id');
    }

    public function weeks()
    {
        return $this->belongsToMany(Week::class, 'week_team');
    }

    public function getEndAttribute()
    {
        $days = $this->attributes['hours'] / 4;
        $start = $this->start;
        $dias = $this->weeks->pluck('code');
        $feriados = $this->events->map(fn($item) => $item->date->format('Y-m-d'));

        for($i = 0; $i < $days ; $i++) {
            for($j = 1 ; $j <= 7; $j++) {
                if($dias->contains($start->format('N'))) {
                    if(!$feriados->contains($start->format('Y-m-d'))) {
                        $start->addDay(1);
                        break;
                    }

                    $j = 0;
                }
                $start->addDay(1);
            }
        }

        return $start->subDay(1)->format('d/m/Y');
    }
}
