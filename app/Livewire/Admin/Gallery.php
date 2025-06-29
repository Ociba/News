<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Services\GalleryService;

class Gallery extends Component
{
    public $galleries = [];

    protected GalleryService $galleryService;

    public function mount()
    {
        $this->galleryService = new GalleryService();
        $this->loadGalleries();
    }

    public function loadGalleries()
    {
        $this->galleries = $this->galleryService->getAllGalleries();
    }

    public function render()
    {
        return view('livewire.admin.gallery', [
            'galleries' => $this->galleries,
        ]);
    }
}
