<?php

namespace App\Traits;

trait HasImage
{
    public function uploadImageLink($request, $path)
    {
        $image = null;

        if ($request->file('image')) {
            $image = $request->file('image');
            $image->storeAs($path, $image->hashName());
        }
        return $image;
    }

    public function uploadImageAsset($request, $path, $name)
    {
        $image = null;
        if ($request->file($name)) {
            $image = $request->file($name);
            move_uploaded_file($image, asset($path . $image->hashName()));
        }
        return $image;
    }
}
