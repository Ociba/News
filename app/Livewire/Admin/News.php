<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\NewsService;

class News extends Component
{
    use WithPagination;

    protected NewsService $newsService;

    public function mount()
    {
        $this->newsService = new NewsService();
    }

    public function render()
    {
        return view('livewire.admin.news', [
            'newsItems' => $this->newsService->getAllNews(10), // or dynamic
        ]);
    }
}
