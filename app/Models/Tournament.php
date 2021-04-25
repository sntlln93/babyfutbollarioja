<?php

namespace App\Models;

use App\Models\Game;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
