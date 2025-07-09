<?php

namespace App\Helpers;

use App\Models\PhotosOnSell;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\URL;

class DownloadHelper
{
    /**
     * Generate a secure download link for a photo
     */
    public static function downloadLink(PhotosOnSell $photo): ?string
    {
        if (!Auth::check() || !self::hasPurchased($photo->id)) {
            return null;
        }
    
        // Generate signed route with expiration (24 hours)
        return URL::temporarySignedRoute(
            'photo.download',
            now()->addHours(24),
            ['photo' => $photo->id]
        );
    }

    /**
     * Handle the actual file download
     */
    /**
 * Handle the actual file download
 * 
 * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
 */
public static function downloadFile(PhotosOnSell $photo): \Symfony\Component\HttpFoundation\BinaryFileResponse
{
    if (!self::hasPurchased($photo->id)) {
        abort(403, 'You must purchase this photo before downloading.');
    }

    // Increment download count
    $photo->increment('download_count');

    $filePath = storage_path('app/public/photos/' . $photo->image_without_watermark);

    if (!file_exists($filePath)) {
        abort(404, 'File not found');
    }

    return response()->download($filePath, "{$photo->slug}.jpg", [
        'Content-Type' => 'image/jpeg',
        'Content-Disposition' => 'attachment; filename="' . $photo->slug . '.jpg"',
    ]);
}

    /**
     * Check if user has purchased the photo
     */
    private static function hasPurchased(int $photoId): bool
    {
        return Auth::user()->photoPurchases()
                    ->where('photo_id', $photoId)
                    ->where('status', 'completed') // Add if you have status field
                    ->exists();
    }

    
}