<?php

namespace App\Livewire\Admin\Forms;

use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use App\Services\AdvertService;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;



class AddAdvert extends ModalComponent
{
    use WithFileUploads;

    public $section_id;
    public $image;
    public $start_date;
    public $end_date;
    public $user_id;
    public $advert_status = 'publish';

    protected $rules = [
        'section_id' => 'required|exists:sections,id',
        'image' => 'required|image|max:2048', // 2MB max
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ];

    public function save()
    {
        $this->validate();
    
        try {
            // Generate file name
            $fileName = 'advert_' . now()->timestamp . '.webp';
    
            // Store image in 'public/adverts' with the generated file name
            $path = $this->image->storeAs('adverts', $fileName, 'public');
    
            // Resize and convert to WebP
            Image::make(storage_path('app/public/' . $path))
                ->fit(800, 800)
                ->save(null, 90, 'webp');
    
            // Save only the file name (not the full path) to DB
            AdvertService::createAdvert([
                'section_id' => $this->section_id,
                'image' => $fileName,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'advert_status' => $this->advert_status,
                'user_id' => Auth::user()->id,
            ]);
    
            $this->closeModal();
            session()->flash('success', 'Advert created!');
            $this->dispatch('Adverts','refreshComponent');
            
        } catch (\Exception $e) {
            session()->flash('error', 'Failed: ' . $e->getMessage());
        }
    }
    

    public function render()
    {
        return view('livewire.admin.forms.add-advert', [
            'sections' => Section::all(),
        ]);
    }
}