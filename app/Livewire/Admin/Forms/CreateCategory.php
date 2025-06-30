<?php

namespace App\Livewire\Admin\Forms;

use LivewireUI\Modal\ModalComponent;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Session;

class CreateCategory extends ModalComponent
{
    public $category;
    public $created_by;

    protected $rules = [
        'category' => 'required |unique:categories',
        'created_by' => '',
    ];

    // Customize validation error messages
    protected $messages = [
        'category.required' => 'Category is required',
    ];

    public function createCategory()
    {
        $this->validate();

        CategoryService::createCategory($this->category);
        Session::flash('msg', 'Operation Succesful');
        $this->dispatch('Category', 'refreshComponent');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.admin.forms.create-category');
    }
}
