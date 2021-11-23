<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['teacher_id', 'name','date'];

    protected $casts = [
        'date' => 'datetime:d/m/Y'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'event_team','teams_id','event_id');
    }
}
