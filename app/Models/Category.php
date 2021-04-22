<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class);
    }
}
