<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Services\GalleryService;

class CreateGallery extends Component
{
    public $heading;
    public $image;

    protected $rules = [
        'heading' => 'required|string|max:255',
        'image'   => 'required|string', // adjust if you handle file uploads
    ];

    protected GalleryService $galleryService;

    public function mount()
    {
        $this->galleryService = new GalleryService();
    }

    public function createGallery()
    {
        $this->validate();

        $this->galleryService->createGallery($this->heading, $this->image);

        session()->flash('success', 'Gallery created successfully.');

        $this->reset(['heading', 'image']);

        // Optionally emit event or redirect
        $this->emit('galleryCreated');
    }

    public function render()
    {
        return view('livewire.admin.create-gallery');
    }
}
