<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $guarded = [];
    protected $dates = ['born_in'];

    public function getTeamAttribute()
    {
        return $this->teams()->where('is_active', true)->first();
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->lastname;
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class)->withTimestamps()->withPivot('is_active', 'created_at')->orderByPivot('created_at', 'desc');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
