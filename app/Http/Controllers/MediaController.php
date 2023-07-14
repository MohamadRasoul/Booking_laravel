<?php

namespace App\Http\Controllers;

class MediaController extends Controller
{
    public function uploadImage()
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2000'
        ]);

        $filename = time() . '_' . random_int(100000000, 999999999) . '.' . request()->image->extension();
        $image = request()->image->move(public_path('images/temp'), $filename);

        return response()->success(
            "you image is upload",
            [
                "image" => $filename,
            ]
        );
    }
}
