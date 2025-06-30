<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Services\SectionService;
use Livewire\WithPagination;

class Section extends Component
{
    use WithPagination;

    protected $listeners = ['Section' => '$refresh'];

    public $perPage = 10;
    public $search = '';
    public $sortBy = 'section_name';

    protected string $paginationTheme = 'bootstrap';

    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.admin.section',[
            'sections' =>SectionService::getAllSections($this->perPage)
        ]);
    }
}
