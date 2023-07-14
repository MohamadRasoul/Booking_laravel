<?php

namespace App\Services;

use Bepsvpt\Blurhash\Facades\BlurHash;
use Intervention\Image\ImageManagerStatic;

class MediaService
{
    public static function hashImage($image_path)
    {
        if (str_contains($image_path, config('app.url'))) {
            $image_path = public_path(str_replace(config('app.url'), "", $image_path));
        }

        $image = ImageManagerStatic::make($image_path);
        $hashImage = BlurHash::encode($image);
        return $hashImage;
    }


}
