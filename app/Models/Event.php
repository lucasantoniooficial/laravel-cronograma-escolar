<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['teacher_id', 'name','date','recorrency'];

    protected $casts = [
        'date' => 'datetime:d/m/Y'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function getYearAttribute()
    {
        return $this->date->format('Y');
    }

    public function getCalendarAttribute()
    {
        return $this->where('recorrency', 1)->exists() ? "Sim" : "Não";
    }

    public function setRecorrencyAttribute($value)
    {
        $this->attributes['recorrency'] = $value == 1 || $value == 'Sim' ? 1 : 0;
    }

    public function getRecorrencyAttribute()
    {
        return $this->attributes['recorrency'] == 1 ? "Sim" : "Não";
    }
}
