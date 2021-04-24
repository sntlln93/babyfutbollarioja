<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function getTypeAttribute($value)
    {
        return Str::title($value);
    }

    public function getIconAttribute()
    {
        if ($this->type == "Gol") {
            return asset('img/gol.svg');
        } elseif ($this->type == "Tarjeta Verde") {
            return asset('img/green.svg');
        } elseif ($this->type == "Tarjeta Roja") {
            return asset('img/red.svg');
        }

        return asset('img/yellow.svg');
    }
}
