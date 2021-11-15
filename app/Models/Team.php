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

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function weeks()
    {
        return $this->belongsToMany(Week::class, 'week_team');
    }

    public function getEndAttribute()
    {
        $days = $this->attributes['hours'] / 4;
        $start = $this->start;

        for($i = 0; $i < $days ; $i++) {
            foreach($this->weeks as $week) {
                if(collect(Carbon::getDays())->keys()->contains(intval($week->code))) {
                    dump($start->dayName);
                    break;
                }

            }

            dump($i);

            $start->addDays(1);

        }
        dd($start);
//        return $this->attributes['start']->addHours($this->attributes['hours'])->format('d/m/Y');
    }
}
