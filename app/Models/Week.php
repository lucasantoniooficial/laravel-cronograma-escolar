<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Week extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
