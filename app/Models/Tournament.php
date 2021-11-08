<?php

namespace App\Models;

use App\Models\Game;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $guarded = [];
    protected $casts = [
        'categories' => 'array',
        'clubs' => 'array'
    ];

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

    public function getVisibilityAttribute()
    {
        return $this->is_public ? 'Público' : 'Privado';
    }

    public function getClubsAttribute($value)
    {
        return json_decode($value);
    }

    public function getCategoriesAttribute($value)
    {
        return json_decode($value);
    }

    public function IsParticipating($clubId)
    {
        return collect($this->clubs)->first(fn ($club) => $club->id == $clubId) ? true : false;
    }
}
