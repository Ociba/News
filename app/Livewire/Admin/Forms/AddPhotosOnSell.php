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
        $directory = storage_path('app/public/photos');

        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        $watermarkedPath = $directory . '/wm_' . $filename;
        $originalPath = $directory . '/' . $filename;

        // Create base image with higher resolution maintenance
        $image = Image::make($this->image->getRealPath())
            ->resize(1600, 1200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

        // ===== ADVANCED WATERMARKING TECHNIQUES =====

        // 1. Add noise pattern overlay (subtle but hard to remove)
        $this->addNoisePattern($image, 3);

        // 2. Main watermark with shadow effect
        $this->addPrimaryWatermark($image);

        // 3. Tiled micro-watermarks (nearly invisible but detectable)
        $this->addMicroWatermarks($image);

        // 4. Edge watermarks (follows image contours)
        $this->addEdgeWatermarks($image);

        // 5. Metadata embedding
        $image->setFileInfoFromPath($this->image->getRealPath());

        // Save watermarked image
        $image->save($watermarkedPath, 85, 'webp', [
            'quality' => 85,
            'copyright' => 'Copyright © ' . date('Y') . ' Explore Africa',
            'title' => $this->title . ' | Licensed Content'
        ]);

        // Save original (unmodified) version
        Image::make($this->image->getRealPath())
            ->resize(1600, 1200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->save($originalPath, 100, 'webp');

        // Database record
        PhotosOnSell::create([
            'section_id' => $this->section_id,
            'user_id' => Auth::id(),
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'license_type' => $this->license_type,
            'image_with_watermark' => 'wm_' . $filename,
            'image_without_watermark' => $filename,
            'watermark_pattern' => Str::random(32) // Unique pattern identifier
        ]);

        $this->closeModal();
        session()->flash('success', 'Photo added successfully with advanced protection!');
        $this->dispatch('PhotosOnSell', 'refreshComponent');
    }

    // ===== WATERMARKING HELPERS =====

    protected function addPrimaryWatermark($image)
    {
        // Shadow effect
        $image->text(
            'EXPLORE AFRICA',
            ($image->width() / 2) + 2,
            ($image->height() / 2) + 2,
            function ($font) {
                $font->size(5);
                $font->color('rgba(0,0,0,0.6)');
                $font->align('center');
                $font->valign('middle');
            }
        );

        // Main text
        $image->text(
            'EXPLORE AFRICA',
            $image->width() / 2,
            $image->height() / 2,
            function ($font) {
                $font->size(5);
                $font->color('rgba(255,255,255,0.9)');
                $font->align('center');
                $font->valign('middle');
            }
        );

        // Protection border
        $image->rectangle(
            50,
            50,
            $image->width() - 50,
            $image->height() - 50,
            function ($draw) {
                $draw->border(2, 'rgba(255,0,0,0.2)');
            }
        );
    }

    protected function addMicroWatermarks($image)
    {
        $text = '© ' . date('Y') . ' EXPLORE-AFRICA-' . Str::random(4);
        $density = min($image->width(), $image->height()) / 5;

        for ($i = 0; $i < $density; $i++) {
            $x = rand(0, $image->width());
            $y = rand(0, $image->height());
            $size = rand(1, 3);
            $opacity = rand(1, 3) / 10;

            $image->text(
                $text,
                $x,
                $y,
                function ($font) use ($size, $opacity) {
                    $font->size($size);
                    $font->color("rgba(255,255,255,$opacity)");
                    $font->angle(rand(0, 360));
                }
            );
        }
    }

    protected function addEdgeWatermarks($image)
    {
        $edgeText = str_repeat('EXPLORE AFRICA • ', 5);
        $positions = [
            ['y' => 30, 'angle' => 0],
            ['y' => $image->height() - 30, 'angle' => 0],
            ['x' => 30, 'angle' => 90],
            ['x' => $image->width() - 30, 'angle' => 90]
        ];

        foreach ($positions as $pos) {
            $x = $pos['x'] ?? null;
            $y = $pos['y'] ?? null;

            $image->text(
                $edgeText,
                $x,
                $y,
                function ($font) use ($pos) {
                    $font->size(3);
                    $font->color('rgba(255,0,0,0.4)');
                    $font->angle($pos['angle']);
                    $font->valign('middle');
                }
            );
        }
    }

    protected function addNoisePattern($image, $intensity)
    {
        $noise = Image::canvas($image->width(), $image->height());

        for ($i = 0; $i < ($image->width() * $image->height() / $intensity); $i++) {
            $x = rand(0, $image->width());
            $y = rand(0, $image->height());
            $color = rand(0, 1) ? 'rgba(255,0,0,0.01)' : 'rgba(0,0,255,0.01)';

            $noise->pixel($color, $x, $y);
        }

        $image->insert($noise);
    }


    public function render()
    {
        return view('livewire.admin.forms.add-photos-on-sell', [
            'sections' => Section::all(),
        ]);
    }
}
