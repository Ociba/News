<?php

namespace App\Livewire\Welcome\Section;

use App\Services\CategoryService;
use Livewire\Component;

class CategoryTags extends Component
{
    public $perPage = null;

    public function render()
    {
        return view('livewire.welcome.section.category-tags',[
            'categories' =>CategoryService::getAllCategories($this->perPage)
        ]);
    }
}
