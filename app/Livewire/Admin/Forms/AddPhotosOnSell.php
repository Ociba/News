<?php

namespace App\Livewire\Admin\Forms;

use App\Models\PhotosOnSell;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Intervention\Image\ImageManagerStatic as Image;

class AddPhotosOnSell extends ModalComponent
{
    use WithFileUploads;

    public $section_id;
    public $title;
    public $description;
    public $price;
    public $license_type = 'standard';
    public $image;

    protected $rules = [
        'section_id' => 'required|exists:sections,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'license_type' => 'required|in:standard,extended,exclusive',
        'image' => 'image|max:2048', // 2MB limit
    ];

    public function save()
{
    $this->validate();

    $filename = 'photo_' . now()->timestamp . '_' . Str::random(6) . '.webp';

    // Ensure directory exists
    $directory = storage_path('app/public/photos');
    if (!file_exists($directory)) {
        mkdir($directory, 0755, true);
    }

    // File paths
    $watermarkedPath = $directory . '/wm_' . $filename;
    $originalPath = $directory . '/' . $filename;

    // Create and save watermarked image
    Image::make($this->image->getRealPath())
        ->resize(1200, 800, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })
        ->text('Explore Africa', 100, 100, function ($font) {
            $font->size(108);
            $font->color('#ffffff');
            $font->align('left');
            $font->valign('top');
            $font->angle(0);
        })
        ->save($watermarkedPath, 90, 'webp');

    // Create and save original image
    Image::make($this->image->getRealPath())
        ->resize(1200, 800, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })
        ->save($originalPath, 90, 'webp');

    // Save to DB
    PhotosOnSell::create([
        'section_id' => $this->section_id,
        'user_id' => Auth::id(),
        'title' => $this->title,
        'description' => $this->description,
        'price' => $this->price,
        'license_type' => $this->license_type,
        'image_with_watermark' => 'wm_' . $filename,
        'image_without_watermark' => $filename,
    ]);

    $this->closeModal();
    session()->flash('success', 'Photo added successfully!');
    $this->dispatch('PhotosOnSell', 'refreshComponent');
}


    public function render()
    {
        return view('livewire.admin.forms.add-photos-on-sell', [
            'sections' => Section::all(),
        ]);
    }
}
