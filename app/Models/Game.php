<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'local_score',
        'away_score',
    ];

    protected $casts = [
        'local' => 'object',
        'away' => 'object',
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
