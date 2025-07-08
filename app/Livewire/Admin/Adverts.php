<?php

namespace App\Livewire\Admin;

use App\Services\AdvertService;
use Livewire\Component;
use Livewire\WithPagination;

class Adverts extends Component
{
    use WithPagination;

    protected $listeners = ['Adverts' => '$refresh'];

    public $search = '';
    public $perPage = 10;
    public $sortBy = 'start_date';

    
    protected string $paginationTheme = 'bootstrap';

    public function updatedSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        return view('livewire.admin.adverts',[
            'adverts' =>AdvertService::getAllAdverts($this->perPage)
        ]);
    }
}
