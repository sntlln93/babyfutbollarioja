<?php

namespace App\Services;

use Illuminate\Support\Str;

class CreateImageService
{
    public function create($imageable, $image)
    {
        $base_path = Str::afterLast(Str::lower(get_class($imageable)), '\\');

        return $image->store($base_path, 'public');
    }
}
