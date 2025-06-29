<?php

namespace App\Services;

use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;

class GalleryService
{
    public function getAllGalleries()
    {
        return Gallery::latest()->get();
    }

    public function findGallery(int $id)
    {
        return Gallery::findOrFail($id);
    }

    public function createGallery(string $heading, string $image)
    {
        return Gallery::create([
            'heading'    => $heading,
            'image'      => $image,
            'created_by' => Auth::id(),
        ]);
    }

    public function updateGallery(int $id, string $heading, string $image)
    {
        $gallery = $this->findGallery($id);
        $gallery->update([
            'heading' => $heading,
            'image'   => $image,
        ]);

        return $gallery;
    }

    public function deleteGallery(int $id)
    {
        $gallery = $this->findGallery($id);
        return $gallery->delete();
    }
}
