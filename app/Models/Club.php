<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $guarded = [];

    public function teams(){
        return $this->hasMany(Team::class);
    }

    public function phone(){
        return $this->morphOne(Phone::class, 'phoneable');
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
