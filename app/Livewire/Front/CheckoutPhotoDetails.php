<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\PhotosOnSell;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CheckoutPhotoDetails extends Component
{
    public $photo;
    public $canDownload = false;

    public function mount($photoId)
    {
        $this->photo = PhotosOnSell::with('purchases')->findOrFail($photoId);

        if (Auth::check()) {
            $this->canDownload = $this->photo->purchases()
                ->where('buyer_id', Auth::id())
                ->where('status', 'completed')
                ->exists();
        }
    }

    public function download()
    {
        if (!$this->canDownload) {
            return;
        }

        // Increment download count
        $this->photo->increment('download_count');

        $filePath = storage_path('app/public/photos/' . $this->photo->image_without_watermark);
        $fileName = 'explorer-Africa.jpg'; // Your custom filename

        return response()->download($filePath, $fileName, [
            'Content-Type' => 'image/jpeg',
        ]);
    }

    public function render()
    {
        return view('livewire.front.checkout-photo-details');
    }
}