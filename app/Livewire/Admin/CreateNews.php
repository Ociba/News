<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Section;
use LivewireUI\Modal\ModalComponent;
use App\Services\NewsService;
use App\Traits\savePhotosToNewsFolder;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;

class CreateNews extends ModalComponent
{
    use savePhotosToNewsFolder,WithFileUploads;

    public $title, $content, $category_id, $section_id, $photo, $status = 'publish';
    public $categories;
    public $sections;

    protected $rules = [
        'title'       => 'required|string|max:255',
        'content'     => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'section_id'  => 'required|exists:sections,id',
        'photo'       => 'required|unique:news|mimes:jpeg,png,jpg,webp|max:10240',
        'status'      => 'required|in:draft,publish,archive',
    ];


    public function mount()
    {
        $this->categories = Category::get();
        $this->sections = Section::get();
    }

    public function createNews()
    {
        $this->validate();

        $savedFileName = $this->saveToNews('photo',$this->photo);

        NewsService::createNews([
            'title'       => $this->title,
            'content'     => $this->content,
            'category_id' => $this->category_id,
            'section_id'  => $this->section_id,
            'photo'       => $savedFileName,
            'status'      => $this->status,
        ]);

        Session::flash('msg', 'Operation Succesful');
        $this->dispatch('News', 'refreshComponent');
        $this->closeModal();

        // session()->flash('success', 'News article created successfully.');

        // $this->reset(['title', 'content', 'category_id', 'section_id', 'photo', 'status']);
    }

    public function render()
    {
        return view('livewire.admin.create-news');
    }
    
}
