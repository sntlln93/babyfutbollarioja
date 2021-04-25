<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function getTitleAttribute($value)
    {
        return Str::title($value);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
