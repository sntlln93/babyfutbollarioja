<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class DeleteImageFromDiskService
{
    public function delete($image_path)
    {
        Storage::delete('public/' . $image_path);
    }
}
