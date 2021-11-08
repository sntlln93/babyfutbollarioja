<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
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
}
