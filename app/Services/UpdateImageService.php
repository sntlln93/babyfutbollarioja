<?php

namespace App\Services;

use Illuminate\Support\Str;

class UpdateImageService
{
    public function update($imageable, $image)
    {
        (new DeleteImageFromDiskService)->delete($imageable->image->path);

        $imageable->image->update([
            'path' => $image->store(Str::lower(get_class($imageable)), 'public'),
        ]);
    }
}
