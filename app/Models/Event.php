<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    private $icons = [
        'goal' => 'fas fa-futbol',
        'green' => 'fas fa-square text-green',
        'red' => 'fas fa-square text-danger',
        'yellow' => 'fas fa-square text-warning',
    ];

    protected $casts = [
        'player' => 'object'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function getIconAttribute()
    {
        return $this->icons[$this->type];
    }
}
