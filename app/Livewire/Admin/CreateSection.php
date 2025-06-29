<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Services\SectionService;

class CreateSection extends Component
{
    public $section_name;

    protected $rules = [
        'section_name' => 'required|string|max:255',
    ];

    protected SectionService $sectionService;

    public function mount()
    {
        $this->sectionService = new SectionService();
    }

    public function createSection()
    {
        $this->validate();

        $this->sectionService->createSection($this->section_name);

        session()->flash('success', 'Section created successfully.');

        $this->reset('section_name');

        // Optionally emit event or redirect
        $this->emit('sectionCreated');
    }

    public function render()
    {
        return view('livewire.admin.create-section');
    }
}
