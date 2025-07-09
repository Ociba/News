<?php

namespace App\Services;

use App\Models\PhotosOnSell;
use App\Models\PhotoPurchase;
use Illuminate\Support\Facades\Storage;

class PhotoSaleService
{
    public static function getAllPhotos($filter = null, $perPage, $search = null)
    {
        $query = PhotosOnSell::with(['section', 'user']);

        if ($filter === 'published') {
            $query->published();
        } elseif ($filter === 'drafts') {
            $query->drafts();
        } elseif ($filter === 'archived') {
            $query->archived();
        }

        if (!empty($search)) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        return $query->latest()->paginate($perPage);
    }

    public static function getPhotosOnSale(){
        return PhotosOnSell::with(['section', 'user', 'purchases'])->whereStatus('publish')->latest()->get();
    }

    public static function getAllPhotosOnSale($perPage){
        return PhotosOnSell::with(['section', 'user', 'purchases'])->whereStatus('publish')
        ->latest()->paginate($perPage);
    }

    

    public function getPhotoById($id)
    {
        return PhotosOnSell::with(['section', 'user', 'purchases'])->findOrFail($id);
    }

    public function createPhoto(array $data)
    {
        $data['image_with_watermark'] = $this->storeImage($data['image_with_watermark']);
        $data['image_without_watermark'] = $this->storeImage($data['image_without_watermark']);

        return PhotosOnSell::create($data);
    }

    public function updatePhoto($id, array $data)
    {
        $photo = PhotosOnSell::findOrFail($id);

        if (isset($data['image_with_watermark'])) {
            $this->deleteImage($photo->image_with_watermark);
            $data['image_with_watermark'] = $this->storeImage($data['image_with_watermark']);
        }

        if (isset($data['image_without_watermark'])) {
            $this->deleteImage($photo->image_without_watermark);
            $data['image_without_watermark'] = $this->storeImage($data['image_without_watermark']);
        }

        $photo->update($data);
        return $photo;
    }

    public function deletePhoto($id)
    {
        $photo = PhotosOnSell::findOrFail($id);
        
        $this->deleteImage($photo->image_with_watermark);
        $this->deleteImage($photo->image_without_watermark);
        
        return $photo->delete();
    }

    public function purchasePhoto($photoId, $buyerId, array $paymentData)
    {
        $photo = PhotosOnSell::findOrFail($photoId);

        $purchase = PhotoPurchase::create([
            'photo_id' => $photo->id,
            'buyer_id' => $buyerId,
            'amount' => $photo->price,
            'transaction_id' => $paymentData['transaction_id'],
            'payment_method' => $paymentData['payment_method'],
            'status' => 'completed', // or 'pending' depending on your payment flow
            'download_expires_at' => now()->addDays(30), // 30-day download window
            'license_agreement' => $this->generateLicenseAgreement($photo),
        ]);

        return $purchase;
    }

    protected function storeImage($image)
    {
        return $image->store('photos', 'public');
    }

    protected function deleteImage($imagePath)
    {
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }

    protected function generateLicenseAgreement($photo)
    {
        return "License Agreement for {$photo->title}\n\n" .
               "License Type: {$photo->license_type}\n" .
               "Price: {$photo->price}\n" .
               "Purchased on: " . now()->toDateString() . "\n" .
               "Terms: Non-exclusive right to use the photo for personal or commercial purposes.";
    }
}