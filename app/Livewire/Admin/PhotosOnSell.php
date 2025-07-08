<?php

namespace App\Livewire\Admin;

use App\Services\PhotoSaleService;
use Livewire\Component;
use Livewire\WithPagination;

class PhotosOnSell extends Component
{
    use WithPagination;

    protected $listeners = ['PhotosOnSell' => '$refresh'];

    public $search = '';
    public $perPage = 10;
    public $filter;
    public $sortBy = 'title';

    
    protected string $paginationTheme = 'bootstrap';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.photos-on-sell',[
            'photos' =>PhotoSaleService::getAllPhotos($this->filter, $this->perPage, $this->search)
        ]);
    }
}
