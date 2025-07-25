<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\NewsService;

class News extends Component
{
    use WithPagination;

    protected $listeners = ['News' => '$refresh'];

    public $perPage = 10;
    public $search = '';
    public $sortBy = 'title';


    protected string $paginationTheme = 'bootstrap';

    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.admin.news',[
            'news'=>NewsService::getAllNews($this->perPage)
        ]);
    }
}
