<?php

namespace App\Livewire\Front;

use App\Models\Advert;
use App\Models\News;
use Livewire\Component;
use Livewire\Attributes\On;

class Category extends Component
{
    public $category;
    public $perPage = 4;
    public $currentAdvertIndex = 0;
    public $adverts = [];

    public function mount($category)
    {
        $this->category = $category;
        $this->adverts = $this->getCategoryAdvert()->toArray();
    }

    public function render()
    {
        return view('livewire.front.category', [
            'categories' => News::getCategory($this->category, $this->perPage),
            'hasAdverts' => count($this->adverts) > 0,
        ]);
    }

    private function getCategoryAdvert()
    {
        $categoryId = \App\Models\Category::whereCategory($this->category)->value('id');
        return Advert::whereCategoryId($categoryId)->get();
    }

    #[On('startSliderJS')]
    public function rotate()
    {
        if (count($this->adverts) > 0) {
            $this->currentAdvertIndex = ($this->currentAdvertIndex + 1) % count($this->adverts);
        }
    }

    public function startSlider()
    {
        if (count($this->adverts) > 1) {
            $this->js(<<<'JS'
                setInterval(() => {
                    $wire.rotate();
                }, 3000);
            JS);
        }
    }
}