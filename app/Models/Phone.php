<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $guarded = [];

    public function phoneable()
    {
        return $this->morphTo();
    }

    public function getFullNumberAttribute()
    {
        return '(' . $this->area_code . ') ' . $this->number;
    }
}
