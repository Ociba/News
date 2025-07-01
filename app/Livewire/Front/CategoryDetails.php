<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\News;

class CategoryDetails extends Component
{
    public $categoryId;

    public function mount($categoryId){
        $this->categoryId -$categoryId;
    }
    
    public function render()
    {
        return view('livewire.front.category-details',[
            'details' => News::getCategoryNewsDetails($this->categoryId),
            'trendings'=>News::getSection('trending')
        ]);
    }
}
