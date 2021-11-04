<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id','registration'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function scopeUpdateUser($query, $data)
    {
        $this->update($data);

        $this->user->update($data);

        return $this;
    }

    public function scopeDeleteUser()
    {

        $this->user->delete();

        $this->delete();

        return $this;
    }
}
