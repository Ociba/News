<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    protected $listeners = ['Users' => '$refresh'];

    public $search = '';
    public $perPage = 10;
    public $sortBy = 'email';

    protected string $paginationTheme = 'bootstrap';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.users', [
            'users' => User::searchAndSort($this->search, $this->sortBy)->paginate($this->perPage)
        ]);
    }
}
