<?php

namespace App\Services;

use App\Models\Advert;
use Illuminate\Support\Facades\Storage;

class AdvertService
{
    public static function getAllAdverts($perPage)
    {
        return Advert::with(['section', 'user'])->latest()->paginate($perPage);
    }

    public static function getActiveAdverts()
    {
        return Advert::whereAdvertStatus('publish')->with(['section', 'user'])->latest()->get();
    }

    public static function getCurrentlyActiveAdverts()
    {
        return Advert::active()->with(['section', 'user'])->latest()->get();
    }


    public static function getAdvertById($id)
    {
        return Advert::with(['section', 'user'])->findOrFail($id);
    }

    public static function createAdvert(array $data)
    {
        return Advert::create($data);
    }

    public static function updateAdvert($id, array $data)
    {
        $advert = Advert::findOrFail($id);
    
        if (isset($data['image'])) {
            // Delete old image if exists
            if ($advert->image) {
                Storage::disk('public')->delete($advert->image);
            }
        }
    
        $advert->update($data);
        return $advert;
    }

    public static function deleteAdvert($id)
    {
        $advert = Advert::findOrFail($id);
        
        if ($advert->image) {
            $this->deleteImage($advert->image);
        }
        
        return $advert->delete();
    }

    protected function storeImage($image)
    {
        return $image->store('adverts', 'public');
    }

    protected function deleteImage($imagePath)
    {
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }
}