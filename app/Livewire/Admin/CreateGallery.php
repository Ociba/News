<?php

namespace App\Livewire\Admin;

use LivewireUI\Modal\ModalComponent;
use App\Services\GalleryService;
use Illuminate\Support\Facades\Session;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CreateGallery extends ModalComponent
{
    use WithFileUploads;

    public $heading;
    public $image;
    public $uploadedImageName;

    protected $rules = [
        'heading' => 'required|string|max:255',
        'image'   => 'required|image|max:2048', // 2MB Max
    ];

    public function createGallery()
    {
        $this->validate();

        // Process and store the image
        $this->processImage();

        // Create gallery with processed image
        GalleryService::createGallery($this->heading, $this->uploadedImageName);

        Session::flash('msg', 'Operation Successful');
        $this->dispatch('Gallery', 'refreshComponent');
        $this->closeModal();
    }

    protected function processImage()
    {
        // Generate unique filename
        $filename = Str::slug($this->heading) . '-' . time() . '.webp';
        
        // Process image using Intervention Image
        $image = Image::make($this->image->getRealPath())
            ->fit(800, 800) // Resize and crop to 800x800
            ->encode('webp', 80); // Convert to WebP with 80% quality

        // Store the processed image
        Storage::disk('public')->put('gallery/' . $filename, $image);

        // Save the filename for database storage
        $this->uploadedImageName = $filename;
    }

    public function render()
    {
        return view('livewire.admin.create-gallery');
    }
}