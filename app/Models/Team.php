<?php

namespace App\Models;

use App\Traits\Events;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes, Events;

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
        return $this->calculateDateEnd($this->days, $this->start, $this->weeks->pluck('code'), $this->holidays);
    }

    public function getDaysAttribute()
    {
        return $this->attributes['hours'] / 4;
    }

    public function getHolidaysAttribute()
    {
        return $this->events->map(fn($item) => $item->date->format('Y-m-d'));
    }
}
