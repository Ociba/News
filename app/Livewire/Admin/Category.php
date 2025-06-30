<?php

namespace App\Livewire\Admin;

use App\Services\CategoryService;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;

    protected $listeners = ['Category' => '$refresh'];

    public $search = '';
    public $perPage = 10;
    public $sortBy = 'category';

    
    protected string $paginationTheme = 'bootstrap';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.category',[
            'categories' =>CategoryService::getAllCategories($this->perPage)
        ]);
    }
}
