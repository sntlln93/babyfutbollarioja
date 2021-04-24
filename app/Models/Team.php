<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function players()
    {
        return $this->belongsToMany(Player::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
