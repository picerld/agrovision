<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageHelper
{

    public static function handleImage($data)
    {
        $fileName = time() . '.' . $data->extension();
        $data->storeAs('commodities', $fileName, 'public');

        return $fileName;
    }
}
