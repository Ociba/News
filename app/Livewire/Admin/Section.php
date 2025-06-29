<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Services\SectionService;

class Section extends Component
{
    public $sections = [];

    protected SectionService $sectionService;

    public function mount()
    {
        $this->sectionService = new SectionService();
        $this->loadSections();
    }

    public function loadSections()
    {
        $this->sections = $this->sectionService->getAllSections();
    }

    public function render()
    {
        return view('livewire.admin.section', [
            'sections' => $this->sections,
        ]);
    }
}
