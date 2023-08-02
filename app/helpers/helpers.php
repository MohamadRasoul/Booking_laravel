<?php

use Illuminate\Support\Facades\Http;

if (!function_exists('getImage')) {
    function getImage($collections)
    {
        // '483718'
        $response = Http::get(
            "https://api.unsplash.com/photos/random",
            [
                'client_id' => '3KuVSJdP8YbcqTl1DmkC9DluEXlDsbQTV-JyihLm2xM',
                'collections' => $collections,
            ]
        );

        $image = json_decode($response->body());

        $imageUrl = $image->urls->regular;

        return $imageUrl;
    }
}

if (!function_exists('setImage')) {
    function setImage($object, $mediaCollections, $imageCollection)
    {
        $image = getImage($imageCollection);

        $object
            ->addMediaFromUrl($image)
            ->toMediaCollection($mediaCollections);

    }
}
