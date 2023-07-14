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


    public function storeImage(
        $model,
        $image,
        $collection
    ): void
    {

        if (!isset($image)) return;

        if (str_contains($image, config('app.url'))) {
            $image = str_replace(config('app.url'), "", $image);
            $mediaImage = $model
                ->addMedia(public_path($image))
                ->preservingOriginal()
                ->toMediaCollection($collection);
        } else {

            $mediaImage = $model
                ->addMedia(public_path('images/temp/') . $image)
                ->preservingOriginal()
                ->toMediaCollection($collection);
        }
    }

    public function storeStaticImage(
        $model,
        $image,
        $collection
    ): void
    {
        $mediaImage = $model
            ->addMedia(public_path('images/static/') . $image)
            ->preservingOriginal()
            ->toMediaCollection($collection);
    }

    public function storeImageFromUrl(
        $model,
        $imageUrl,
        $collection
    ): void
    {
        $mediaImage = $model
            ->addMediaFromUrl($imageUrl)
            ->toMediaCollection($collection);
    }
}
