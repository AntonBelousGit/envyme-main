<?php

namespace App\Service\Photo\Translators;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Image;
use File;

class PhotoTranslator
{
    public const DEFAULT_IMAGE_LENGTH = 20;
    public const WIDTH_SIZE = 1920;
    public const HEIGHT_SIZE = 987;

    public function addPhoto(Request $request)
    {
        $fileName = time() . '-' . Str::random(self::DEFAULT_IMAGE_LENGTH) . '.' .$request->file('photo')->extension();
        $this->createImagesWithDifferentSize($request, $fileName);
        return $fileName;
    }

    public function deletePhoto(string $fileName)
    {
        unlink(public_path(config('filesystems.images_large') . $fileName));
    }


    private function createImagesWithDifferentSize($request, $fileName){
        $this->makeImage(self::WIDTH_SIZE, self::HEIGHT_SIZE,
            config('filesystems.images_large'),
            $request->file('photo'),
            $fileName);
    }

    private function makeImage($width, $height, $path, $image, $fileName)
    {
        if($image === null){return;}
        $dir = public_path($path);

        if(!File::isDirectory($dir))
        {
            File::MakeDirectory($dir, 493, true);
        }
        Image::make($image)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('data-url')->save(public_path($path . $fileName));
    }
}
