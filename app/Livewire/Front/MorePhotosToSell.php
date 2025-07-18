<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Services\PhotoSaleService;
use Illuminate\Support\Facades\Auth;
use App\Models\PhotoPurchase;
use App\Models\PhotosOnSell;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;
use Carbon\Carbon;

class MorePhotosToSell extends Component
{
    public $perPage = 10;

    public function download($photoId): BinaryFileResponse|RedirectResponse|Redirector
    {
        // Check authentication
        if (!Auth::check()) {
            $this->dispatch('notify', type: 'error', message: 'You must be logged in to download.');
            return redirect()->route('login');
        }

        $photo = PhotosOnSell::findOrFail($photoId);

        // Allow admin to bypass payment check (if needed)
        if (Auth::user()->user_type === 'admin') {
            return $this->processDownload($photo);
        }

        // Verify purchase with additional checks
        $purchase = PhotoPurchase::where('photo_id', $photo->id)
            ->where('buyer_id', Auth::id())
            ->where('status', 'completed')
            ->first();

        if (!$purchase) {
            $this->dispatch('notify', type: 'error', message: 'You must purchase this photo before downloading.');
            return redirect()->away(
                URL::signedRoute('photo.checkout', ['photo' => $photo->id])
            );
        }

        // Check if download has expired (if you have expiration logic)
        if ($purchase->download_expires_at && Carbon::now()->gt($purchase->download_expires_at)) {
            $this->dispatch('notify', type: 'error', message: 'Your download link has expired.');
            return redirect()->back();
        }

        return $this->processDownload($photo);
    }

    protected function processDownload($photo): BinaryFileResponse|RedirectResponse
    {
        // Increment download count
        $photo->increment('download_count');

        // Prepare file download
        $filePath = storage_path('app/public/photos/' . $photo->image_without_watermark);
        $fileName = $photo->slug . '.jpg';

        if (!file_exists($filePath)) {
            $this->dispatch('notify', type: 'error', message: 'File not found.');
            return redirect()->back();
        }

        return response()->download($filePath, $fileName, [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }

    public function render()
    {
        return view('livewire.front.more-photos-to-sell', [
            'photos_on_sales' => PhotoSaleService::getAllPhotosOnSale($this->perPage),
        ]);
    }
}