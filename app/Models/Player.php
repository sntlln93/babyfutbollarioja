<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Support\Facades\DB;
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

    // public function events()
    // {
    //     return $this->hasMany(Event::class, 'player.id');
    // }

    public function getEventsAttribute()
    {
        return Event::select('events.*')->join('players', DB::raw('JSON_EXTRACT(events.player, "$.id")'), '=', 'players.id')->where('players.id', $this->id)->get();
    }
}
