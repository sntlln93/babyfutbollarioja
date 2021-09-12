<?php

namespace App\Services;

use Illuminate\Support\Str;

class UpdateImageService
{
    public function update($imageable, $image)
    {
        (new DeleteImageFromDiskService)->delete($imageable->image->path);
        $base_path = Str::afterLast(Str::lower(get_class($imageable)), '\\');

        $imageable->image->update([
            'path' => $image->store($base_path, 'public'),
        ]);
    }
}
