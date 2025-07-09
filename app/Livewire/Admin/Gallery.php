<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Services\GalleryService;
use Livewire\WithPagination;

class Gallery extends Component
{
   
    use WithPagination;

    protected $listeners = ['Gallery' => '$refresh'];

    public $perPage = 10;
    public $search = '';
    public $sortBy = 'heading';


    protected string $paginationTheme = 'bootstrap';

    public function updatedSearch()
    {
        $this->resetPage();
    }

public function render()
{
    return view('livewire.admin.gallery', [
        'galleries' => GalleryService::getAllGalleries($this->perPage)
    ]);
}
}
