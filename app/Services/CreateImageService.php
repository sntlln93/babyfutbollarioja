<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Support\Str;

class CreateImageService
{
    public function create($imageable, $image)
    {
        $base_path = Str::afterLast(Str::lower(get_class($imageable)), '\\');

        Image::create([
            'path' => $image->store($base_path, 'public'),
            'imageable_id' => $imageable->id,
            'imageable_type' => get_class($imageable)
        ]);
    }
}
