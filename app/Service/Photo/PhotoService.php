<?php

namespace App\Service\Photo;

use Illuminate\Http\Request;
use App\Service\Photo\Translators\PhotoTranslator;

class PhotoService
{
    private $photoTranslator;

    public function __construct(PhotoTranslator $photoTranslator)
    {
        $this->photoTranslator = $photoTranslator;
    }

    public function addPhoto(Request $request)
    {
        return $this->photoTranslator->addPhoto($request);
    }

    public function deletePhoto(string $fileName)
    {
        return $this->photoTranslator->deletePhoto($fileName);
    }
}