<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','code','start','hours','color'];

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
        return $this->belongsToMany(Week::class);
    }
}
