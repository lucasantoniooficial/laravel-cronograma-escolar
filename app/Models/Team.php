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
        foreach($this->weeks as $week) {
            $dias[] = $week->code;
        }

        $start = new \DateTime( $start->format('Y-m-d'));

        for($i = 0; $i < $days ; $i++) {
            for($j = 1 ; $j <= 7 ; $j++) {
                if(in_array($start->format('N'), $dias)) {
                    echo($start->format('d/m/Y')."<br>");
                    $start->add(new \DateInterval('P1D'));
                    break;
                }
                $start->add(new \DateInterval('P1D'));
            }
        }
        dd($start->modify('-1 day'));
        exit;
//        return $this->attributes['start']->addHours($this->attributes['hours'])->format('d/m/Y');
    }
}
