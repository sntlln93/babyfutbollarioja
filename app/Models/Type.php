<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;

    public function getNameAttribute(){
        $matches_are = $this->round_trip ? "Ida y vuelta" : "Partido único";
        return Str::ucfirst($this->type) . '( ' . $matches_are . ")";
    }
}
