<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    protected $casts = [
        'years' => 'array'
    ];

    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class);
    }

    public function setYearsAttribute($value)
    {
        $this->attributes['years'] = json_encode($value);
    }

    //active scope
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
