<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Support\Str;

class CreateImageService
{
    public function create($imageable, $image)
    {
        Image::create([
            'path' => $image->store(Str::lower(get_class($imageable)), 'public'),
            'imageable_id' => $imageable->id,
            'imageable_type' => get_class($imageable)
        ]);
    }
}
