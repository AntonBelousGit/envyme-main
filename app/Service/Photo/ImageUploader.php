<?php

namespace App\Service\Photo;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageUploader 
{
    protected static $extensions = ['png', 'jpg'];

    public static function run($file, $extension = null)
    {
        $extension = $extension && in_array($extension, self::$extensions) ? $extension : 'jpg';

        $imageName = time() . '-' . Str::random(4) . '.' . $extension;
        $image = Image::make($file);

        $image->resize(1000, null,function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode('jpg')->save(public_path('/images/clubs/'. $imageName));
        
        return $imageName;
    }
}