<?php

namespace App\Livewire\Admin;

use LivewireUI\Modal\ModalComponent;
use App\Services\SectionService;
use Illuminate\Support\Facades\Session;

class CreateSection extends ModalComponent
{

    public $section_name;
    

    protected $rules = [
        'section_name' => 'required|unique:sections',
    ];

     // Customize validation error messages
     protected $messages = [
        'section_name.required' => 'Section Name is required',
    ];


    public function createSection()
    {
        $this->validate();

        SectionService::createSection($this->section_name);
        Session::flash('msg', 'Operation Succesful');
        $this->dispatch('Section', 'refreshComponent');
        $this->closeModal();
    }


    public function render()
    {
        return view('livewire.admin.create-section');
    }
}
