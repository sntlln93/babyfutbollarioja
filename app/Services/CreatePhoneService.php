<?php

namespace App\Services;

use App\Models\Phone;

class CreatePhoneService
{
    public function create($phoneable, $area_code, $number)
    {
        Phone::create([
            'area_code' => $area_code,
            'number' => $number,
            'phoneable_id' => $phoneable->id,
            'phoneable_type' => get_class($phoneable)
        ]);
    }
}
