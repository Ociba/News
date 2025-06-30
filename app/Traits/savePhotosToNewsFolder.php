<?php

namespace App\Traits;

trait savePhotosToNewsFolder
{
    /**
     * Save an image to both storage folder and database with the same name.
     *
     * @param  $fileName
     * @return string
     */
    public static function saveToNews($path, $file)
    {
        $savedFileName = $file->getClientOriginalName();
        $file->storeAs('news/'.$path, $savedFileName, 'public');

        return $savedFileName;
    }
}
