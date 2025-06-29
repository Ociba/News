<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Services\NewsService;

class CreateNews extends Component
{
    public $title, $content, $category_id, $section_id, $photo, $status = 'publish';

    protected $rules = [
        'title'       => 'required|string|max:255',
        'content'     => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'section_id'  => 'required|exists:sections,id',
        'photo'       => 'required|string', // or `image` if you're handling uploads
        'status'      => 'required|in:draft,publish,archive',
    ];

    protected NewsService $newsService;

    public function mount()
    {
        $this->newsService = new NewsService();
    }

    public function createNews()
    {
        $this->validate();

        $this->newsService->createNews([
            'title'       => $this->title,
            'content'     => $this->content,
            'category_id' => $this->category_id,
            'section_id'  => $this->section_id,
            'photo'       => $this->photo,
            'status'      => $this->status,
        ]);

        session()->flash('success', 'News article created successfully.');

        $this->reset(['title', 'content', 'category_id', 'section_id', 'photo', 'status']);
    }

    public function render()
    {
        return view('livewire.admin.create-news');
    }
}
