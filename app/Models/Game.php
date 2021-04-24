<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function local()
    {
        return $this->belongsTo(Team::class, 'local_id');
    }

    public function away()
    {
        return $this->belongsTo(Team::class, 'away_id');
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
